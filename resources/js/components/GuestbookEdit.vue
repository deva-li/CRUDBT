<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Update Guest</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>

                        <form @submit.prevent="updateGuestbook">
                            <div class='form-group'>
                                <label htmlFor='nama'>Nama</label>
                                <input type="text" class="form-control" id="nama" v-model="guestbook.nama">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='alamat'>Alamat</label>
                                <input type="text" class="form-control" id="alamat" v-model="guestbook.alamat">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='tujuan'>Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" v-model="guestbook.tujuan">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='nomerhp'>Nomor HP</label>
                                <input type="text" class="form-control" id="nomerhp" v-model="guestbook.nomerhp">
                            </div>
                            <!-- <div class='form-group'>
                                <label htmlFor='content'>Content</label>
                                <textarea type="text" class="form-control" id="content" v-model="article.content" rows="5"></textarea>
                            </div> -->
                            <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                                &nbsp;
                                &nbsp;
                                <button class='btn btn-primary'>Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            guestbook:{},
            errors: [],
            title: null,
            content: null,
        }
    },
    created() {
        let uri = `/api/guestbook/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.guestbook = response.data;
        });
    },
    methods: {
        updateGuestbook(e){
            
            if (this.$data.guestbook.nama != null && this.$data.guestbook.alamat != null && this.$data.guestbook.tujuan != null && this.$data.guestbook.nomerhp != null) {
                
                this.$swal.fire({
                    title: 'Success',
                    text: "Guest edited successfully",
                    icon: 'success',
                    timer: 1000
                });
                let uri = `/api/guestbook/update/${this.$route.params.id}`;
                this.axios.put(uri, this.guestbook).then((response) => {
                    this.$router.push({name: 'home'});
                });
                return true;
            }


            this.errors = [];

            if (!this.nama) {
                    this.errors.push('Nama wajib diisi !');
                }
            if (!this.alamat) {
                    this.errors.push('Alamat wajib diisi !');
                }
            if (!this.tujuan) {
                    this.errors.push('Tujuan wajib diisi !');
                }
            if (!this.nomerhp) {
                    this.errors.push('Nomer HP wajib diisi !');
                }

            e.preventDefault();
        }
    }
  }
</script>