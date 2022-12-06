<template>
    <form ref="sucursalForm" @submit="save" action="">

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="name">Nombre de la sucursal*</label>
                            <input type="text" name="name"  id="name" class="form-control" v-model="name" required>
                            <small class="text-danger" v-if="errors && errors.name">{{ errors.name[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="estado">Estado*</label>
                            <select id="estado" class="form-control" v-model="state_id" @change="changeEstado" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="estado.id" v-for="estado in estados" :key="estado.id">{{ estado.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="estado">Ciudad*</label>
                            <select id="estado" class="form-control" v-model="city" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option :value="ciudad.id" v-for="ciudad in ciudades" :key="ciudad.id">{{ ciudad.name }}</option>
                            </select>
                            <small class="text-danger" v-if="errors && errors.state_id">{{ errors.state_id[0] }}</small>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control" v-model="address">
                            <small class="text-danger" v-if="errors && errors.address">{{ errors.address[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="tel" name="phone"  id="phone" class="form-control" v-model="phone" min="0" maxlength="10" step="1">
                            <small class="text-danger" v-if="errors && errors.phone">{{ errors.phone[0] }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" v-model="email">
                            <small class="text-danger" v-if="errors && errors.email">{{ errors.email[0] }}</small>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>    
        
        <hr/>
        
        <div class="text-end">
            <a type="button" href="/sucursals" class="btn btn-sm btn-secondary mr-5">Cancelar</a>
            <button class="btn btn-sm btn-success ml-3">Guardar</button>
        </div>
    </form>
</template>


<script>
import axios from 'axios';

export default {
    props: ['sucursalIdProp'],
    data(){
        return {
            id: undefined,
            name: '',
            state_id:'',
            city: '',
            address: '',
            phone: '',
            email: '',
            encargado_id: '',
            estados:[],
            ciudades:[],
            errors: undefined,
        }
    },
    watch:{
        state_id(newVal, oldVal) {
            this.changeEstado();
        }

    },
    mounted() {        
        this.getEstado();

        if(this.sucursalIdProp){
            this.getData(this.sucursalIdProp);
        }        
    },
    methods: {
        getEstado(){
            this.estados = []
            axios.get('/api/estado').then(resp => {
                if(resp.data.status){
                    this.estados = resp.data.estados;
                }else{
                    this.estados = []
                }
            })
        },
        changeEstado(){
            this.ciudades = []
            axios.get(`/api/ciudades/${this.state_id}`).then(resp => {
                if(resp.data.status){
                    this.ciudades = resp.data.ciudades;
                }else{
                    this.ciudades = []
                }
            })
        },
        clearForm(){
            this.id = undefined;
            this.name = '';
            this.state_id = '';
            this.city = '';
            this.address = '';
            this.phone = '';
            this.email = '';
            this.encargado_id = '';
        },
        getData(sucursalId){
            this.clearForm();
            axios.get(`/api/sucursal/${sucursalId}`).then(resp => {
                if(resp.data.status){
                    console.log(resp.data.sucursal[0])
                    let aux=resp.data.sucursal[0];
                    this.id             = aux.id;
                    this.name           = aux.name;
                    this.state_id       = aux.state;
                    this.city           = aux.city;
                    this.address        = aux.address;
                    this.phone          = aux.phone;
                    this.email          = aux.email;
                    this.encargado_id   = aux.encargado_id;
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                console.log({error});
                Swal.fire('',"Ocurrio un error al intentar obtener información de la sucursal",'error')
            })

        },
        save(e){
            e.preventDefault();
            if(this.$refs.sucursalForm.reportValidity()){
                this.errors = undefined;
                const formData = new FormData();
                formData.append('name',         this.name);
                formData.append('state',        this.state_id);
                formData.append('city',         this.city);
                formData.append('address',      this.address);
                formData.append('phone',        this.phone);
                formData.append('email',        this.email);
                formData.append('encargado_id', this.encargado_id);

                if(this.sucursalIdProp){
                    formData.append('id', this.sucursalIdProp);
                    this.updateData(this.sucursalIdProp, formData);
                }else{
                    this.storeData(formData);
                }
            }
        },
        updateData(id, data){
            axios.post('/api/sucursal/'+ id ,data).then(resp => {
                if(resp.data.status){
                    Swal.fire('',`Información actualizada`,'success').then(resp => {
                        location.href = "/sucursals"
                    });
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        },
        storeData(data){
            axios.post('/api/sucursal',data).then(resp => {
                if(resp.data.status){
                    const sucursalName = resp.data.sucursal && resp.data.sucursal.name || ""
                    Swal.fire('',
                        `La sucursal <b>${sucursalName}</b> ha sido agregada`,
                        'success'
                    ).then(resp => {
                        location.href = "/sucursals"
                    })
                }else{
                    Swal.fire('Ocurrio un error',resp.data.msg,'error')
                }
            }).catch(error => {
                if(error.response.status == 422){
                    this.errors = error.response.data.errors
                }
            })
        },
    }
}
</script>

