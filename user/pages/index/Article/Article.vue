<template>
	<view>
		<view class="tow">
			<u-icon name="arrow-left" @click="back"></u-icon></view>
	<view class="top">
	</view>
	<view class="model" v-if="data_article_content">
		
	<view class="size">{{data_article_content['title']}}</view>
	<view class="model-litter">
		<span class = "size-tow">{{data_article_content['create_time']}}</span>
		
		</view>
		<view class="centent">
			<u-parse :html="data_article_content['content']"></u-parse>
		</view>
	</view>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				data:null,
				id : 0,
				data_article_content: ""
			}
		},
		onReady(){
			uni.setNavigationBarTitle({
				title: '文章详情'
		});
		},
		onLoad(options) {
			this.id = options.id;
			this.get_article_content();
		
			},	
		onShow() {
		},
		methods: {
			get_article_content(){
				this.$http.get(this.$api.article.articleContent + this.id).then(res=> {
			
					this.data_article_content = res.data;
				})
			},
			back(){
				uni.navigateBack()
			}
		}
	}
</script>

<style lang="scss" scoped>
	
	.top{
		text-align: center;
		font-size: 25px;
	}
	.model{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		// margin-top: 50px;
	}
	.img{
		width: 375px;
		height: 275px;
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
	.size{
		font-size: 25px;
		margin-top: 10px;
		text-align: center;
	}
	.model-litter{
		// margin-top: 20px;
		color: #b6b6b6;
	}
	.centent{
		margin-top: 20px;
		width: 90%;
	}
	.size-tow{
		font-size: 10px;
	}
	.size-t{
		font-size: 16px;
		margin-left: 20px;
	}

</style>

