<template>
	<view class="top">
		<view class="model">
			<b class="size">公司信息</b>
		</view>
		<view class="model-tow shadow" v-if="sys_data">
			<image :src="sys_data['img']" class="img"></image>
			<view class="model-three">
				<u-parse :html="sys_data['description']" style="font-size: 14px;"></u-parse>
				<u-gap height="40" bgColor="#ffffff"></u-gap>	
			</view>
		</view>
	</view>
</template>

<script>
	export default{
		props:['sys_data'],
		data(){
			return {
			}
		},
	methods: {
	}
	}
</script>

<style lang="scss" scoped>
	.top{
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-bottom: 10px;
		width: 100%;
	}
	 .model{
		 width: 95%;
		 height: 50px;
		 background-color: $bgcolro;
		 display: flex;
		 align-items: center;
		 
	 }
	  .size{
		font-size: 18px;
		margin: 10px auto;
		color: #ffffff;
	  }
	.model-tow{
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-top: 5px;
		width: 95%;
	}
	 .size-tow{
		 font-size: 15px;
	 }
	 .img{
		 margin-top: 10px;
		 width: 95%;
		 height: 200px;
	 }
	 .model-three{
		 margin-top: 20px;
		 margin-bottom: 10px;
		 width: 90%;
	 }
</style>
