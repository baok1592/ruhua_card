<template>
	<view class="gloabs iconfont">
		
		<u-swiper style="width: 100%;" v-if="list1[0]" :list="list1" keyName="image" showTitle :autoplay="true"
			circular>
		</u-swiper>
		<home-header :user_data="data_Colleague" :sys_data="data_Systeam" style="width: 100%;"></home-header>

		<view v-if="is_wx&&data_s3['conn']==0">
			<home-model  style="width: 100%;" :collegue_id="id"
				:sys_data="data_Systeam">
			</home-model>
			<home-model-tow  style="width: 100%;" :c_id="id"></home-model-tow>
		</view>

		<view v-if="is_h5&&data_s3['conn']==0">

			<home-model2  style="width: 100%;" :collegue_id="id"
				:sys_data="data_Systeam">

			</home-model2>
		</view>



		<home-model-three style="width: 100%;" :user_data="data_Colleague" class="mode"></home-model-three>
		<u-swiper style="width: 100%;" v-if="list2
		[0]" :list="list2" keyName="image" showTitle :autoplay="false"
			circular>
		</u-swiper>
		<home-model-five v-if="data_s3['conpany']==0" :sys_data="data_Systeam" class="mode"></home-model-five>
		<t1coll class="mode" v-if="data_s3['coll']==0" style="width: 100%;" :user_other="data_OtherColleague"
			:sys_data="data_Systeam"></t1coll>
		<u-swiper style="width: 100%;" v-if="list3[0]" :list="list3" keyName="image" showTitle :autoplay="false"
			circular>
		</u-swiper>
		<home-model-eight class="mode" v-if="data_s3['art']==0" style="width: 100%;"
			:article_title_data="data_article"></home-model-eight>
		<home-model-night class="mode" v-if="data_s3['art3']==0" style="width: 100%;"
			:article_title_data="data_article"></home-model-night>
		<home-model-seven class="mode" v-if="data_s3['art2']==0" style="width: 100%;"
			:article_title_data="data_article"></home-model-seven>
		<u-divider style="margin-bottom: 20px;">下面没有了</u-divider>
	</view>
</template>

<script>
	import HomeHeader from '../components/Header.vue'
	import HomeModel from '../components/Model.vue'
	import HomeModel2 from '../components/Model_h5.vue'
	import HomeModelTow from '../components/ModelTow.vue'
	import HomeModelThree from '../components/ModelThree.vue'
	import HomeModelFive from '../components/ModelFive.vue'
	import t1coll from '../components/t1coll.vue'
	import HomeModelSeven from '../components/ModelSeven.vue'
	import HomeModelEight from '../components/ModleEight.vue'
	import HomeModelNight from '../components/ModelNight.vue'
	export default {
		name: 'coll',
		components: {

			HomeHeader: HomeHeader,
			HomeModel,
			HomeModel2,
			HomeModelTow,
			HomeModelThree,
			HomeModelFive,
			t1coll,
			HomeModelSeven,
			HomeModelEight,
			HomeModelNight
		},
		data() {
			return {
				id: "",
				data_Colleague: "",
				data_Systeam: "",
				data_OtherColleague: "",
				data_article: "",
				data_s3:[],
				list1: [],
				list2: [],
				list3: [],
				is_h5: false,
				is_wx: false
			}
		},
		onLoad(options) {
			this.get_bannner()
			this.get_sw()
			this.id = options.id;
			if (!this.id) {
				this.get_one();
			} else {
				this.get_user()
				this.get_others_user();
			}
			this.get_sysconfig();
			
			this.get_article();
			uni.stopPullDownRefresh()
			// #ifdef H5
			this.is_h5 = true

			// #endif

			// #ifdef MP-WEIXIN
			this.is_wx = true
			// #endif
		},
		onShow() {
			
		},
		onReady() {
			                    
		},
		methods: {
			get_one() {
				this.$http.get(this.$api.home.getone).then(res => {
					this.id = res.data.id
					this.data_Colleague = res.data;
					this.get_others_user();

				})
			},
			get_user() {
				this.$http.get(this.$api.home.get_colleague, {
					id: this.id
				}).then(res => {
					this.data_Colleague = res.data;
				})
			},

			get_sysconfig() {
				this.$http.get(this.$api.home.Systeam2).then(res => {
					this.data_Systeam = res.data;
					uni.setNavigationBarTitle({
						title: res.data['title'],
					});
				})
			},
			get_sw() {
				this.$http.get(this.$api.home.Systeam+"?type=3").then(res => {
					this.data_s3 = res.data
					console.log(this.data_s3)
				})
			},
			get_others_user() {

				this.$http.get(this.$api.home.OtherColleague, {
					id: this.id
				}).then(res => {

					this.data_OtherColleague = res.data;
				})
			},
			get_article() {
				this.$http.get(this.$api.home.Article).then(res => {

					this.data_article = res.data;
				})
			},
			get_bannner() {
				this.$http.get(this.$api.home.get_banner).then(res => {
					console.log(this.list1s);
					for (let k of res.data) {

						if (k.cid == 1) {
							let c = {
								image: k.img_url,
								title: k.description
							}
							this.list1.push(c);

						} else if (k.cid == 2) {
							let c = {
								image: k.img_url,
								title: k.description
							}
							this.list2.push(c);

						} else if (k.cid == 3) {
							let c = {
								image: k.img_url,
								title: k.description
							}
							this.list3.push(c);
						}
					}


				})
			}
		}
	}
</script>


<style lang="scss" scoped>
	.gloabs {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}

	.mode {
		margin-top: 15px;
	}
</style>
