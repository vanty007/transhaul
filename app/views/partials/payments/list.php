    <template id="paymentsList">
        <section class="page-component">
        <div>

<div class="banner text-center">
  <div class="container">
    <div class="row">
        <div class="col-lg-9 mx-auto">
          <h1 class="mb-5">Payment <br> Records</h1>
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
<section class="section-sm">
  <div class="container">
    <div class="widget">
                <div class="row ">
                    <div  class="col-sm-4 comp-grid" :class="setGridSize">
                        <h3 class="record-title">Details</h3>
                    </div>
                    <div v-if="searchfield" class="col-sm-4 comp-grid" :class="setGridSize">
                        <input @keyup.enter="dosearch()" v-model="searchtext" class="form-control" type="text" name="search" placeholder="Search" />
                    </div>
                </div>
        <!-- post-item -->
        <div v-if="records.length">
          <div v-for="(data,index) in records">
          <article class="widget-card">
              <div class="d-flex">
                <div class="row">
                  <!--<div class="col-md-6">
                      <img class="card-img-sm" :src="data.picture" style="float:left;border-radius: 20px;width: 300px;height: 200px;margin: 0 auto;overflow: hidden;object-fit: fill;display: block;margin: auto;">
                  </div>-->
                  <div class="col-md-12">
                  <!--<div class="ml-3">-->
                      <h5><a class="post-title">{{data.item_name}}</a></h5>
                      <i class="fa fa-solid fa-calendar"></i> {{data.created_at}}
                      </br>
                      <span style="font-weight: bold;"><i class="fa fa-street-view" aria-hidden="true"></i>Tracking No: {{data.tracking_id}}</span>
                      <ul class="card-meta list-inline">
                        <li class="list-inline-item">
                            <a class="card-meta-author" v-if="data.payment_status == 0">
                            <span style="color:red;"><i class="fa fa-user"></i> Confirmation Pending</span>
                            </a>
                            <a class="card-meta-author" v-if="data.payment_status == 1">
                            <span style="color:green;"><i class="fa fa-user"></i> Payment Confirmed</span>
                            </a>
                        </li>
                        <span><i class="fa fa-user"></i> {{data.firstname}} {{data.lastname}}</span>
                      </ul>
                  <!--</div>-->
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

</div>
    </template>
    <script>
	var PaymentsListComponent = Vue.component('paymentsList', {
		template: '#paymentsList',
		mixins: [ListPageMixin],
		props: {
			limit : {
				type : Number,
				default : defaultPageLimit,
			},
			pagename : {
				type : String,
				default : 'payments',
			},
			routename : {
				type : String,
				default : 'paymentslist',
			},
			apipath : {
				type : String,
				default : 'payments/list',
			},
			tablestyle: {
				type: String,
				default: ' table-striped table-sm',
			},
		},
		data: function(){
			return {
				pagelimit : defaultPageLimit,
			}
		},
		computed : {
			pageTitle: function(){
				return 'Payments';
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
			}
		},
		methods:{
			load:function(){
				this.records = [];
				if (this.loading == false){
					this.ready = false;
					this.loading = true;
					var url = this.apiUrl;
					this.$http.get(url).then(function (response) {
						var data = response.body;
						if(data && data.records){
							this.totalrecords = data.total_records ;
							if(this.pagelimit  > data.records.length){
								this.loadcompleted = true;
							}
							this.records = data.records;
						}
						else{
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
		}
	});
	</script>
