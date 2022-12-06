<template>
    <div>
        <table class="table table-striped  table-sm table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>id</th>
                    <th>Tutor</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Calificación</th>
                    <th>Comentario</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="registros && registros.length > 0">
                <tr class="btn-reveal-trigger" v-for="registro in registros" :key="registro.id" >
                    <td class="text-center"><a>{{ registro.id }}</a></td>
                    <td class="text-center col-md-2"><a>{{ registro.tutor.nombre }}</a></td>
                    <td class="text-center texto-desborde">{{ registro.materia.nombre }}</td>
                    <td class="text-center texto-desborde">
                        <div v-if="(registro.estado=='Pendiente')"><span class="text-warning">{{ registro.estado }}</span></div>
                        <div v-if="(registro.estado=='Aceptada')"><span class="text-success">{{ registro.estado }}</span></div>
                        <div v-if="(registro.estado=='Rechazada')"><span class="text-danger">{{ registro.estado }}</span></div>
                        
                    </td>
                    <td class="text-center texto-desborde">{{ registro.promedio_obtenido }}</td>
                    <td class="texto-desborde">{{ registro.comentario }}</td>
                    <!-- <td class="texto-desborde">{{ registro.estado_cuenta }}</td> -->
                    <td class="text-center col-md-2">
                        <a href="{{  route('sucursal-crear') }}" class="btn btn-sm btn-outline-primary rounded tn-sm me-2"><i class="bi bi-check2"></i></a>
                        <a href="{{  route('sucursal-crear') }}" class="btn btn-sm btn-outline-danger rounded tn-sm"><i class="bi bi-x-lg"></i></a>
                        
                            <!-- <div class="dropdown font-sans-serif position-static"> -->
                        
                            <!-- <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/profesores/solicitudes/${registro.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(registro)" href="#!">Eliminar</a>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="7">
                        <p class="text-center" v-if="registros">No hay registros</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-end" v-if="registros && registros.length > 0">
            <small>{{ registros.length }} Registros</small>
        </p>

    </div>
</template>
<script>
feather.replace()
import axios from 'axios'

export default {
    data(){
        return {
            registros: undefined,
        }
    },
    mounted(){
        this.getData();
        // console.log(this.registros);
    },
    methods: {
        getData(){
            axios.get('/api/solicitudes_tutorias').then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data);
                    this.registros = resp.data.Solicitudes_tutorias
                }
                // console.log(this.registros);
            });
        },
        confirmDelete(registro){
            Swal.fire({
                html: `¿Desea eliminar el registro <b>${registro.id}</b>?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("1123213")
                    this.deleteData(registro)
                }
            })
            // this.deleteData(registro)
        },
        deleteData(registro){
            console.log("ento")
            axios.delete(`/api/solicitudes_tutorias/${registro.id}`).then(resp => {
                console.log("a")
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `El registro <b>${registro.id}</b> ha sido eliminado`,
                        'success'
                    ).then(resp => {
                        this.getData();
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
    }
}

</script>


<style scoped>
</style>

