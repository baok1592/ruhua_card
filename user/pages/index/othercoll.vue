<template>
	<view>
		<view class="tow">
			<u-icon name="arrow-left" @click="back"></u-icon></view>
		<view class="gloabs iconfont">
		
		
		<home-header :user_data="data_Colleague" :sys_data="data_Systeam" style="width: 100%;"></home-header>
		
		<home-model-three  style="width: 100%;" :user_data="data_Colleague"></home-model-three>
		
		
	</view>
</view>
	
</template>

<script>
	
	import HomeHeader from '../components/Header.vue'
	import HomeModel from '../components/Model.vue'
	import HomeModelTow from '../components/ModelTow.vue'
	import HomeModelThree from '../components/ModelThree.vue'
	import HomeModelFive from '../components/ModelFive.vue'
	import t1coll from '../components/t1coll.vue'
	import HomeModelSeven from '../components/ModelSeven.vue'
	import HomeModelEight from '../components/ModleEight.vue'
	// import HomeModelNight from '../components/ModelNight.vue'
	export default {
		name: 'coll',
		components: {
			
			HomeHeader: HomeHeader,
			HomeModel,
			HomeModelTow,
			HomeModelThree,
			HomeModelFive,
			t1coll,
			HomeModelSeven,
			HomeModelEight,
			// HomeModelNight
		},
		data() {
			return {
				id: "",
				data_Colleague: "",
				data_Systeam: "",
				
			}
		},
		onReady(){
			uni.setNavigationBarTitle({
				title: '其他同事'
		});
		},
		onLoad(options) {
			
			
			this.id = options.id;
			if(!this.id){
				this.get_one();
			}else{
				this.get_user()
			
			}
			this.get_sysconfig();
			
			
			
			uni.stopPullDownRefresh()
		},
		methods: {
			get_one() {
				this.$http.get(this.$api.home.getone).then(res => {
					this.id=res.data.id
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
				})
			},
			back(){
				uni.navigateBack()
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
	.tow {
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		width: 40px;
		height: 40px;
		background-color: #cccccc;
		font-size: 15px;
		color: #000000;
		position:fixed;
		margin: 10px;
	}
</style>
