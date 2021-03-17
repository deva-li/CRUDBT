<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>All Guest</div>
                <div class='card-body'>
                    <router-link :to="{ name: 'create' }" class="btn btn-primary">Create new Guest</router-link>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th>Nama</th>
                                    <!-- <th>Alamat</th>
                                    <th>Tujuan</th>
                                    <th>Nomer HP</th>
                                    <th>Waktu Bertamu</th> -->
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(guestbook, index) in guestbooks.data" :key="guestbook.id">
                                    <td width="50" class="text-center">{{ index + 1 }}</td>
                                    <td>{{ guestbook.nama }}</td>
                                    <!-- <td>{{ guestbook.alamat }}</td>
                                    <td>{{ guestbook.tujuan }}</td>
                                    <td>{{ guestbook.nomerhp }}</td>
                                    <td>{{ guestbook.created_at }}</td> -->
                                    <td width="200" class="text-center">
                                        <div class="btn-group">
                                            <router-link :to="{name: 'show', params: { id: guestbook.id }}" class="btn btn-primary">Detail</router-link>
                                            <router-link :to="{name: 'edit', params: { id: guestbook.id }}" class="btn btn-success">Edit</router-link>
                                            <button class="btn btn-danger" @click = "deletePost(guestbook.id)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="guestbooks" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
            </div>
        </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
          guestbooks: {}
        }
    },
    created() {
            this.getResults();
    },
    methods: {
        getResults(page){

            let uri = 'api/guestbooks?page=' + page;
            this.axios.get(uri).then(response => {
                        return response.data;
                    }).then(data => {
                        this.guestbooks = data;
                    });
        },
        deletePost(id)
        {
            this.$swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Deh',
                cancelButtonText: 'Nggak Jadi'
                }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'Guest deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/guestbook/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.guestbooks.splice(this.guestbooks.indexOf(id), 1);
                    });
                    console.log("Deleted guestbook with id ..." +id);
                }
            })
        }
    }
  }
</script>