<template id="Home">
  <div>

  <?php
			if(ROLE_ID=="user" ){
		?>
			<div id="openPaymentModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
              <h4 class="modal-title">Pay for this Pick Up</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body" style="display: grid;justify-content: center;align-items: center;">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                  <form class="form form-default" name="submitPayment" action="<?php print_link('Payments/add'); ?>" @submit.prevent="submitPayment()" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('picture')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="picture">Upload Payment Prove <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <niceupload
                                                        fieldname="picture"
                                                        control-class="upload-control"
                                                        dropmsg="Drop files here to upload"
                                                        uploadpath="uploads/files/"
                                                        filenameformat="random" 
                                                        :filesize="3" 
                                                        :maximum="1" 
                                                        name="picture"
                                                        v-model="user.picture"
                                                        v-validate="{required:true}"
                                                        data-vv-as="Picture"
                                                        >
                                                    </niceupload>
                                                    <small v-show="errors.has('picture')" class="form-text text-danger">{{ errors.first('picture') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('payment_method')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="payment_method">Payment Method <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <dataselect
                                                        v-model="user.payment_method"
                                                        data-vv-value-path="user.payment_method"
                                                        data-vv-as="Payment Method"
                                                        v-validate="{required:true}"
                                                        placeholder="Select A Payment Method ... " name="payment_method" :multiple="false" 
                                                        :datasource="payment_methodOptionList"
                                                        >
                                                    </dataselect>
                                                    <small v-show="errors.has('payment_method')" class="form-text text-danger">{{ errors.first('payment_method') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary"  :disabled="errors.any()" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="loading" color="#fff" size="14px"></clip-loader>
                                            </i>
                                            Submit
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>
    <div class="banner text-center">
        <div class="container">
          <div class="row">
              <div class="col-lg-9 mx-auto">
                <h1 class="mb-5">What Would You <br> Like To Pick Up Today?</h1>
              </div>
          </div>
        </div>
        <svg class="banner-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
              stroke-miterlimit="10" />
          <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
          <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
              stroke-miterlimit="10" />
        </svg>
        <svg class="banner-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter0_d)">
              <path class="path"
                d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
              <path
                d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
                stroke="#040306" stroke-miterlimit="10" />
          </g>
          <defs>
              <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                <feOffset dy="4" />
                <feGaussianBlur stdDeviation="2" />
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
              </filter>
          </defs>
        </svg>
    </div>
    <div class="text-center">
        <router-link to="/pickup_request/add" class="btn btn-success">New Pick Up Request <i class="fa fa-solid fa-truck"></i></router-link>
    </div>
    <section class="section-sm">
        <div class="container">
          <div class="widget">
              <h4 class="widget-title">Recent Requests</h4>
              <!-- post-item -->
              <div v-if="records.length">
                <div v-for="(data,index) in records">
                <article class="widget-card" v-if="(data.records.pickup_status == 0 ||data.records.pickup_status == 1)">
                    <div class="d-flex">
                      <div class="row">
                        <div class="col-md-3">
                        <router-link  title="View Record" :to="'/pickup_request/view/' + data.records.id">
                            <img class="card-img-sm" :src="data.records.image || 'assets/images/carts.jpg'"  style="justify-content: center;align-items: center;border-radius: 50px;width: 120px;height: 120px;margin: 0 auto;overflow: hidden;object-fit: fill;display: block;margin: auto;">
                        </router-link>
                        </div>
                        <div class="col-md-9">
                        <div class="ml-3" style="margin-right:100px;">
                        <div class="row">
                        <div class="col-md-12">
                            <h5><a class="post-title">{{data.records.item_name}}</a></h5>
                            <i class="fa fa-solid fa-calendar"></i> {{data.records.created_at}}</br>
                            <i class="fa fa-solid fa-map-marker" style="color:#077A07"></i> {{data.records.pickup_address}}, {{data.records.pickup_city}}, {{data.records.pickup_state}}
                            <div>|</div>
                            <i class="fa fa-flag" style="color:#B50202"></i> {{data.records.receiver_address}}, {{data.records.receiver_city}}, {{data.records.receiver_state}}
                            </br>
                            <span style="font-weight: bold;"><i class="fa fa-street-view" aria-hidden="true"></i>Tracking No: {{data.records.tracking_id}}</span>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                              <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a class="card-meta-author" v-if="data.records.driver_id == null">
                                    <span><i class="fa fa-user"></i> Rider Pending</span>
                                    </a>
                                    <a :href="'#riders_availability/view/'+data.records.driver_id" class="card-meta-author" v-if="data.records.driver_id != null">
                                    <span><i class="fa fa-user"></i> {{data.records.firstname}} {{data.records.lastname}} 
                                    <i class="fa fa-phone" style="font-size:14px;color:#077A07"></i><a :href="'tel: '+ data.records.phoneno"> {{data.records.phoneno}}</a> 
                                    </span>
                                    </a>
                                </li>
                              </ul>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <li class="list-inline-item">
                          <li class="list-inline-item"><i class="fa fa-road"></i>{{data.records.distance}} KM</li>
                            <ul class="card-meta-tag list-inline" v-if="data.records.pickup_status == 0 && data.records.driver_id == null">
                              <li class="list-inline-item" style="color:red;">Processing</li>
                              <li @click="cancelPickup(data.records.id)" class="list-inline-item"><a>Cancel Pick Up <i class="fa fa-ban"></i></a></li>
                            </ul>
                            <!--<ul class="card-meta-tag list-inline" v-if="data.records.payment_status == 0 && data.payments == false && data.records.driver_id != null">
                              <li class="list-inline-item" style="color:red;">Pending Payment</li>
                              <li class="list-inline-item" @click="showPopOpenPaymentModal(data.records)"><a>Make Payment <i class="fa fa-money-bill"></i></a></li>
                            </ul>-->
                            <ul class="card-meta-tag list-inline" v-if="data.records.pickup_status == 1">
                              <li class="list-inline-item" style="color:red;">Pending Pick Up</li>
                            </ul>
                            <ul class="card-meta-tag list-inline" v-if="data.records.pickup_status == 2">
                              <li class="list-inline-item" style="color:red;">In Transit</li>
                            </ul>
                            <ul class="card-meta-tag list-inline" v-if="data.records.pickup_status == 3">
                              <li class="list-inline-item" style="color:red;">Delivered</li>
                              <li class="list-inline-item"><a>Rate Delivery<i class="fa fa-star"></i></a></li>
                            </ul>
                          </li>
                        </div>
                        </div>
                        </div>
                        </div>
                      </div>
                      <!--<li class="list-inline-item"><a href="tags.html" style="float:right;">Demo</a></li>-->
                    </div>
                </article>
                </div>

                <ul class="pagination justify-content-center">
                    <li class="page-item page-item active ">
                      <a href="#!" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                      <a href="#!" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                      <a href="#!" class="page-link">&raquo;</a>
                    </li>
                </ul>
              </div>
                  <div class="row justify-content-center" v-else>
                    <div class="col-sm-12 text-center">
                      <img src="lib/images/no-search-found.png" alt=""  style="object-fit: cover;width:200px;height:200px;">
                      <h3>No Search Found</h3>
                    </div>
                  </div>
          </div>
        </div>
    </section>
    <?php
      }
    else if(ROLE_ID=="driver" ){
    ?>
			<div id="openPaymentInfoModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<div class="modal-content">
						<div class="modal-header">
              <h4 class="modal-title">Confirm Payment</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body" style="display: grid;justify-content: center;align-items: center;">
              <div class="row justify-content-center" v-if="paymentsinfo==false">
                <div class="col-sm-12 text-center">
                  <img src="lib/images/no-search-found.png" alt=""  style="object-fit: cover;width:200px;height:200px;">
                  <h3>No Payment made yet</h3>
                </div>
              </div>
              <div class="row justify-content-center" v-else>
                <div class="col-sm-12 text-center">
                  <img :src="paymentsinfo.picture" alt=""  style="object-fit: cover;width:200px;height:200px;">
                  <button class="btn btn-primary"  type="button">Confirm<i class="fa fa-send"></i></button>
                </div>
              </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>

<div class="banner text-center">
        <div class="container">
          <div class="row">
              <div class="col-lg-9 mx-auto">
                <h1 class="mb-5">Watchout for <br>Today's Pick Up</h1>
              </div>
          </div>
        </div>
        <svg class="banner-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
              stroke-miterlimit="10" />
          <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
          <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
              stroke-miterlimit="10" />
        </svg>
        <svg class="banner-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter0_d)">
              <path class="path"
                d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
              <path
                d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
                stroke="#040306" stroke-miterlimit="10" />
          </g>
          <defs>
              <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                <feOffset dy="4" />
                <feGaussianBlur stdDeviation="2" />
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
              </filter>
          </defs>
        </svg>
    </div>
    <div class="text-center">
        <button @click="driverStatus(2)" class="btn btn-success" v-if="driver_status==1">Make me Offline <i class="fa fa-solid fa-toggle-off"></i></button>
        <button @click="driverStatus(1)" class="btn btn-success" v-if="driver_status==2">Make me Online <i class="fa fa-solid fa-toggle-on"></i></button>
    </div>
    <section class="section-sm">
        <div class="container">
          <div class="widget">
              <h4 class="widget-title">PickUp Requests</h4>
              <!-- post-item -->
              <div v-if="records.length">
              <div v-for="(data,index) in records">
                <article class="widget-card" v-if="(data.records.pickup_status == 0 ||data.records.pickup_status == 1) && driver_status==1 && data.records.driver_id == <?php echo USER_ID; ?>">
                    <div class="d-flex">
                      <div class="row">
                        <div class="col-md-3">
                        <router-link  title="View Record" :to="'/pickup_request/view/' + data.records.id">
                            <img class="card-img-sm" :src="data.records.picture || 'assets/images/carts.jpg'" style="justify-content: center;align-items: center;border-radius: 50px;width: 120px;height: 120px;margin: 0 auto;overflow: hidden;object-fit: fill;display: block;margin: auto;">
                        </router-link>
                        </div>
                        <div class="col-md-9">
                        <div class="ml-3" style="margin-right:100px;">
                        <div class="row">
                        <div class="col-md-12">
                            <h5><a class="post-title">{{data.records.item_name}}</a></h5>
                            <i class="fa fa-solid fa-calendar"></i> {{data.records.created_at}}</br>
                            <i class="fa fa-solid fa-map-marker" style="color:#077A07"></i> {{data.records.pickup_address}}, {{data.records.pickup_city}}, {{data.records.pickup_state}}
                            <div>|</div>
                            <i class="fa fa-flag" style="color:#B50202"></i> {{data.records.receiver_address}}, {{data.records.receiver_city}}, {{data.records.receiver_state}}
                            </br>
                            <span style="font-weight: bold;"><i class="fa fa-street-view" aria-hidden="true"></i>Tracking No: {{data.records.tracking_id}}</span>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a class="card-meta-author" v-if="data.records.pickup_status == 0">
                                    <span><i class="fa fa-solid fa-truck"></i> Rider Pending</span>
                                    </a>
                                    <a href="author-single.html" class="card-meta-author" v-if="data.records.pickup_status == 1">>
                                    <span><i class="fa fa-solid fa-truck"></i> Transit to Pickupss</span>
                                    </a>
                                </li>
                              </ul>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <li class="list-inline-item">
                          <li class="list-inline-item"><i class="fa fa-road"></i>{{data.records.distance}} KM</li>
                              <li class="list-inline-item">
                                  <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item" v-if="data.records.pickup_status == 0" style="color:red;">Pick Up Assigned</li>
                                    <li class="list-inline-item" v-if="data.records.pickup_status == 0" @click="acceptPickup(data.records.id)"><a>Accept <i style="color:green;" class="fa fa-check"></i></a></li>
                                    <li class="list-inline-item" v-if="data.records.pickup_status == 0" @click="rejectPickup(data.records.id)"><a>Reject <i style="color:red;" class="fa fa-times"></i></a></li>
                                    
                                    <li class="list-inline-item" v-if="data.records.pickup_status == 1" style="color:red;">Pickup Accepted</li>
                                    <li class="list-inline-item" v-if="data.records.pickup_status == 1" @click="startPickup(data.records.id)"><a>Start Journey<i style="color:green;" class="fa fa-shopping-basket"></i></a></li>
                                    <li class="list-inline-item" v-if="data.records.pickup_status == 1 && data.records.payment_status == 0" @click="confirmPayment(data.records.id)"><a>Confirm Payment<i style="color:green;" class="fa fa-money"></i></a></li>
                              
                                  </ul>
                              </li>
                          </li>
                        </div>
                        </div>
                        </div>
                        </div>
                      </div>
                      <!--<li class="list-inline-item"><a href="tags.html" style="float:right;">Demo</a></li>-->
                    </div>
                </article>
              </div>
              </div> 
                  <div class="row justify-content-center" v-else>
                    <div class="col-sm-12 text-center">
                      <img src="lib/images/no-search-found.png" alt=""  style="object-fit: cover;width:200px;height:200px;">
                      <h3>No Search Found</h3>
                    </div>
                  </div>
                <ul class="pagination justify-content-center">
                    <li class="page-item page-item active ">
                      <a href="#!" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                      <a href="#!" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                      <a href="#!" class="page-link">&raquo;</a>
                    </li>
                </ul>

          </div>
        </div>
    </section>

        <?php
      }
      ?>
  </div>
</template>
        <script>
			var HomeComponent = Vue.component('HomeComponent', {
				template : '#Home',
                mixins: [ListPageMixin],
				props: {
			limit : {
				type : Number,
				default : defaultPageLimit,
			},
			pagename : {
				type : String,
				default : 'home',
			},
			routename : {
				type : String,
				default : 'home',
			},
			apipath : {
				type : String,
				default : 'home/index',
			},
			exportbutton: {
				type: Boolean,
				default: false,
			},
			importbutton: {
				type: Boolean,
				default: false,
			},
			tablestyle: {
				type: String,
				default: ' table-striped table-sm',
			},
		},
				data : function() {
					return {
            pagelimit : defaultPageLimit,
						loading : false,
						ready: false,
            user : {
              request_id: '',payer: '',picture: '',payment_method: '',
            },
            payment_methodOptionList: ["Cash","Transfer","POS","ATM","QRCODE"],
            driver_status:1,
            paymentsinfo:'',
					}
				},
		computed : {
			pageTitle: function(){
				return 'Propertylist';
			},
			filterGroupChange: function(){
				return ;
			},
		},
		watch : {
			allSelected: function(){
				//toggle selected record
				this.selected = [];
				if(this.allSelected == true){
					for (var i in this.records){
						var id = this.records[i].id;
						this.selected.push(id);
					}
				}
			},
		},
				methods : {
					showPopOpenPaymentModal: function(data){ 
					//alert(img)
					//this.modalimage = img
          this.user.request_id = data.id;
          this.user.payer = "requester";
					$('#openPaymentModal').modal();
        			},
			submitPayment : function(e){
						var payload = this.user;
						this.loading = true;
						var self = this;
						var apiurl = setApiUrl('Payments/add');
						this.$http.post( apiurl , payload , {emulateJSON:true} ).then(function (response) {
							self.loading = false;
							//window.location = response.body;
              this.user = {request_id: '',payer: '',picture: '',payment_method: '',};
				      this.$validator.reset();
              this.load();
              $('#openPaymentModal').modal("hide");
							//location.reload();

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
					},
			load:function(){
				this.records = [];
				this.test = [];
				if (this.loading == false){
					this.ready = false;
					this.loading = true;
					var url = this.apiUrl;
					this.$http.get(url).then(function (response) {
						var data = response.body;
						console.log(data)
						if(data && data.records){
							this.totalrecords = data.total_records;
							if(this.pagelimit  > data.records.length){
								this.loadcompleted = true;
							}
							this.records = data.records;
              this.driver_status = data.driver_status;
							
							//foo();
							
						}
						else{
							console.log(response)
							this.$root.$emit('requestError' , response);
						}
						this.loading = false
						this.ready = true
					},
					function (response) {
						this.loading = false;
						this.$root.$emit('requestError' , response);
					});
				}
			},	
			filterGroup: function(){
				var filters = {};
				this.filterMsgs = [];
				this.filter(filters);
			},
      rejectPickup : function(id){
						var apiurl = setApiUrl('components/rejectPickup/'+id);
						this.$http.get( apiurl).then(function (response) {
							console.log(response)
							this.load()
						},
						function (response) {
							console.log(response)
						});
					},
					acceptPickup : function(id){
						var apiurl = setApiUrl('components/acceptPickup/'+id);
						this.$http.get( apiurl).then(function (response) {
							console.log(response)
							this.load()
						},
						function (response) {
							console.log(response)
						});
					},
					startPickup : function(id){
						var apiurl = setApiUrl('components/startPickup/'+id);
						this.$http.get( apiurl).then(function (response) {
							console.log(response)
							this.load()
						},
						function (response) {
							console.log(response)
						});
					},
          setPaymentInfo : function(val){
            console.log(val)
						this.paymentsinfo=val;
            $('#openPaymentInfoModal').modal();
					},
					confirmPayment : function(id){
						var apiurl = setApiUrl('components/confirmPayment/'+id);
						this.$http.get( apiurl).then(function (response) {
							console.log(response)
              //$('#openPaymentInfoModal').modal("hide");
							this.load()
						},
						function (response) {
							console.log(response)
						});
					},
					driverStatus : function(id){
						var apiurl = setApiUrl('components/driverStatus/'+id);
						this.$http.get( apiurl).then(function (response) {
							console.log(response)
							this.load()
						},
						function (response) {
							console.log(response)
						});
					},
          cancelPickup : function(id){
						var apiurl = setApiUrl('components/cancelPickup/'+id);
						this.$http.get( apiurl).then(function (response) {
							console.log(response)
							this.load()
						},
						function (response) {
							console.log(response)
						});
					},

				},
				mounted : function() {
					this.ready = true;
				},
			});
		</script>
	