<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Ciudad</th>
                    <th>Mascotas</th>
                    <th>Dirección</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="clients && clients.length > 0">
                <tr class="btn-reveal-trigger" v-for="client in clients" :key="client.id" v-on="getPetsNames(client.pets)">
                    
                    <td><a :href="`/cliente/${client.id}`">{{ client.name }}</a></td>
                    <td class="texto-desborde">{{ client.email }}</td>
                    <td class="texto-desborde">{{ client.phone }}</td>
                    <td>{{ client.ciudad && client.ciudad.name }}</td>
                    <td>
                        <div v-if="showBadge===true">
                            <span class="badge bg-primary">{{ petsNamesList }}</span>
                        </div>
                        <div v-else>
                            {{ petsNamesList }}
                        </div>
                        </td>
                    <td>{{ client.address }}</td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/client/${client.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(client)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="6">
                        <p class="text-center" v-if="clients">No hay clientes</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-end" v-if="clients && clients.length > 0">
            <small>{{ clients.length }} Clientes</small>
        </p>

    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return {
            clients: undefined,
        }
    },
    mounted(){
        this.getClients();
    },
    methods: {
        getPetsNames(pets){
            let petsNamesList=""
            let showBadge=false
            if(pets != ""){
                if(pets.length>1){//si es mayor a una mascota mostrar como numero
                    petsNamesList=pets.length
                    showBadge=true
                }
                else{ //muestra nombre de unica mascota
                    petsNamesList=pets[0].name
                    if(String(petsNamesList).length>15){ //recorta caracteres si son mas de 30
                        petsNamesList=String(petsNamesList.substring(0,15))+"..."
                    }
                } 
            }
            else{//si es null
                petsNamesList="0"
                showBadge=true
                }
            this.petsNamesList=petsNamesList
            this.showBadge=showBadge

        },
        getClients(){
            axios.get('/api/alumnos').then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data);
                    this.clients = resp.data.clients
                }
            });
        },
        confirmDelete(client){
            Swal.fire({
                html: `¿Desea eliminar el cliente <b>${client.name}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.deleteClient(client)
                }
            })
        },
        deleteClient(client){
            axios.delete(`/api/client/${client.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `El cliente <b>${client.name}</b> ha sido eliminado`,
                        'success'
                    ).then(resp => {
                        this.getClients();
                    })
                }else{
                    Swal.fire(
                        'Ocurrio un error',
                        resp.data.msg,
                        'error'
                    )
                }
            });
        },
        loadErorrImage(e){
            console.log({e});
            e.target.src = "/img/image-not-found.png";
        }
    }
}
</script>


<style scoped>
</style>
