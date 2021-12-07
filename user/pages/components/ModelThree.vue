<template>
	<view class="top">
		<view class="model">
			<view class="model-one">
				<b class="size">个人简介</b>
			</view>
			<view class="model-tow shadow">
				<view class="model-three">
					<u-parse :html="user_data.content" style="font-size: 14px;"></u-parse>
					<u-gap height="40" bgColor="#ffffff"></u-gap>	
				</view>
			</view>
		</view>
		
	</view>
</template>

<script>
	export default{
		props:['user_data'],
		data(){
			return {
			
			}
		},
	methods:{
			}
	}
</script>

<style lang="scss" scoped>
	.top{
		display: flex;
		align-items: center;
		flex-direction: column;
		justify:center;
		margin-bottom: 15px;
	}
	.model{
		display: flex;
	
		flex-direction: column;
		width: 95%;
	}
	 .model-one{
		 display: flex;
		 
		 
		 width: 100%;
		 height: 50px;
		 background-color: $bgcolro;
	 }
	  .size{
		  font-size: 18px;
		  margin: 10px auto;
		  color: #ffffff;
	  }
	 .model-tow{
		 display: flex;
		 flex-direction: column;
		 flex-wrap: wrap;
		 align-items: center;
		 width: 100%;
		 margin-top: 5px;
	 }
	 .size-tow{
		 margin-top: 10px;
		 font-size: 15px;
	 }
	 .model-three{
		 width: 95%;
	 }
</style>
