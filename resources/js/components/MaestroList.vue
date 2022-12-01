<template>
    <div>
        <table class="table table-sm  table-hover">
            <thead>
                <tr class="btn-reveal-trigger">
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Numero de control</th>
                    <th>Semestre</th>
                    <th>Tipo de cuenta</th>
                    <th>Estado de cuenta</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody v-if="maestros && maestros.length > 0">
                <tr class="btn-reveal-trigger" v-for="client in maestros" :key="client.id" >
                    
                    <td><a :href="`/alumno/${client.id}`">{{ client.nombre }}</a></td>
                    <td class="texto-desborde">{{ client.correo }}</td>
                    <td class="texto-desborde">{{ client.estado_cuenta }}</td>
                    <td class="text-center">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                <div class="bg-white py-2">
                                    <a class="dropdown-item" :href="`/alumno/${client.id}/editar`">Editar</a>
                                    <a class="dropdown-item text-danger" @click="confirmDelete(client)" href="#!">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="7">
                        <p class="text-center" v-if="maestros">No hay alumnos</p>
                        <p class="text-center" v-else>Cargando...</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p class="text-end" v-if="maestros && maestros.length > 0">
            <small>{{ maestros.length }} Alumnos</small>
        </p>

    </div>
</template>
<script>
import axios from 'axios'

export default {
    data(){
        return {
            maestros: undefined,
        }
    },
    mounted(){
        this.getData();
    },
    methods: {
        getData(){
            axios.get('/api/maestros').then((resp)=>{
                if(resp.data.status){
                    console.log(resp.data);
                    this.maestros = resp.data.maestros
                }
            });
        },
        confirmDelete(client){
            Swal.fire({
                html: `¿Desea eliminar al alumno <b>${client.nombre}</b>?`,
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
        deleteData(client){
            axios.delete(`/api/alumno/${client.id}`).then(resp => {
                if(resp.data.status){
                    Swal.fire(
                        'Eliminado',
                        `El alumno <b>${client.name}</b> ha sido eliminado`,
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
