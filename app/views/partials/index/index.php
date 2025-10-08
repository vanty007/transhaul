<template id="Index">
   <div>
      <section class="section-sm">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                  <div class="content mb-5">
                     </br></br></br>
                     <h2 id="we-would-love-to-hear-from-you">Login</h2>
                  </div>
                  <form name="loginForm" action="<?php print_link('index/login'); ?>" @submit.prevent="login()" method="post">
                     <b-alert class="animated shake" variant="danger" :show="showError" @dismissed="showError=false" dismissible>
                        {{errorMsg}}
                     </b-alert>
                     <div class="form-group">
                        <label for="name">Email or Phone No (Required)</label>
                        <input type="text" name="username" v-model="user.username" class="form-control" placeholder="John@joe.com" required>
                     </div>
                     <div class="form-group">
                        <label for="password">Password (Required)</label>
                        <input type="password" name="password" class="form-control" v-model="user.password" placeholder="*****" required>
                     </div>
                     <a href="<?php print_link('passwordmanager') ?>" class="text-danger">Forgot Password? </a>
                     <div class="form-row">
                        <button class="btn btn-primary" type="submit">
                            <i class="load-indicator"><clip-loader :loading="loading" color="#fff" size="14px"></clip-loader></i>Login <i class="fa fa-key"></i>
                        </button>
                        <div class="checkboxes" style="margin-top: 10px !important;margin-left: 10px"><input style="transition: box-shadow 0.2s !important;border-box;padding: 0;" name="rememberme" type="checkbox" id="remember-me" value="true"> <label for="remember-me">Login as Rider</label></div>
                     </div>
                     <div class="text-center">
                        Don't have an account? 
                        <router-link to="/register" class="btn btn-success">Register
                           <i class="fa fa-user"></i>
                        </router-link>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
   </div>
</template>
        <script>
			var IndexComponent = Vue.component('IndexComponent', {
				template : '#Index',
				data : function() {
					return {
						user : {
							username : '',
							password : '',
						},
						loading : false,
						ready: false,
						errorMsg : '',
						showError : false,
					}
				},
				computed: {
					setGridSize: function(){
						if(this.resetgrid){
							return 'col-sm-12 col-md-12 col-lg-12';
						}
					}
				},
				methods : {
					login : function(e){
						var payload = this.user;
						this.loading = true;
						var self = this;
						var apiurl = setApiUrl('index/login');
						this.$http.post( apiurl , payload , {emulateJSON:true} ).then(function (response) {
							self.loading = false;
							window.location = response.body;
						},
						function (response) {
							this.loading = false;
							this.showError = false
							this.errorMsg = response.statusText;
							//Flashes messages
							setTimeout(function(){
								self.showError = true;
							}, 100);
						});
					}
				},
				mounted : function() {
					this.ready = true;
				},
			});
		</script>
