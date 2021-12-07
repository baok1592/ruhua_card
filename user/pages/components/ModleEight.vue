<template>
	<view class="top">
		<view class="model"><b class="size">公司图集</b></view>
		<view class="model-one">
			<scroll-view class="uni-swiper-tab" scroll-x :style="'height:'+'px'">
				<view @click="handleImgs(item)" class="model-one-l shadow" v-if = "item['type'] == 1" v-for = "(item,index) in article_title_data" :key ="item['id']" >
					<img :src="item['img_url']" class="img"/>
					<view><span class="size-tow">{{item['description']}}</span></view>
				</view>				
			</scroll-view>
		</view>
	</view>
</template>

<script>
	export default {
		props:['article_title_data'],
		methods: {
			handleImgs (item) {
				uni.navigateTo({
					url:"/pages/index/Article/Imgart?id=" + item['id']
				});
			}
		}
	}
</script>

<style lang="scss" scoped>
	.top{
		margin-top: 10px;
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.model{
		width: 95%;
		height: 50px;
		background-color: $bgcolro;
		display: flex;
		align-items: center;
	}
	.model-one{
		display: flex;
		justify-content: space-between; 
		width: 95%;
		height: 230px;
		margin: 10px;
		}
		.model-one-l{
				align-items: center;
				flex-direction: column;
				display: inline-block;
				text-align: center;
				margin-right:2%;
				width: 45%;
				height: 95%;
			}
	.size{
		font-size: 18px;
		margin: 10px auto;
		color: #ffffff;
	}
	.img{
		width: 95%;
		height: 80%;
		margin-top: 5px;
		margin-left: 5px;
	}
	
	.size-tow{
		margin-left: 5px;
		font-size: 14px;
		margin-top: 5px;
	}
	.uni-swiper-tab{
	 	white-space: nowrap;
	 }
</style>
