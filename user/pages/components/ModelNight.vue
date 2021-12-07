<template>
	<view class="top">
		<view class="model"><b class="size">公司产品</b></view>
		<view class="model-one">
			<view @click="handleCommodity(item)" class="model-litter" v-if="item['type'] == 2"
				v-for="(item,index) in article_title_data " :key="item.id">
				<view class="ab">
					<img :src="item['img_url']" class="img" />
				</view>
				<view class="model-litter-d u-line-1" >
					<p class="u-line-1" style="margin: 5% ;font-size: 14px; color: #000000;text-align: center">{{item.title}}</p>
					<view style="text-align: center;font-size: 12px; color: #a1a1a1;"><p class="u-line-1" style="text-align: center;" > {{item['description']}}</p></view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		props: ['article_title_data'],
		methods: {
			handleCommodity(item) {
				uni.navigateTo({
					url: "/pages/index/Article/Proart?id=" + item['id']
				})
			}
		}
	}
</script>

<style lang="scss" scoped>
	.top {
		width: 100%;
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-bottom: 10px;
	}

	.model {
		width: 95%;
		height: 50px;
		background-color: $bgcolro;
		display: flex;
		align-items: center;
	}

	.size {
		font-size: 18px;
		margin: 10px auto;
		color: #ffffff;
	}
	.ab{
		width: 100%;
		// height: 200px;
	}
	.model-one {
		width: 100%;
		
		display: flex;
		justify-content: space-between;
		padding: 10px 10px;
		flex-wrap: wrap;
		margin-top: 10px;
		// border: solid 1px red;

	}

	.model-litter {
		
		width: 30%;
		flex-direction: column;
		display: flex;
		
		margin-top: 10px;
		border-bottom-width: 1px;
		box-shadow: 3px 3px 7px  #d6d6d6;
	}

	.img {
		width:100%;
		height: 120px;
	}

	.model-litter-d {
		display: flex;
		color: #000000;
		flex-direction: column;
		justify-content: center;
		width: 100%;
		height: 55px;
		
	}

	.size-one {
		font-size: 12px;
		
	}

	// .shadow-sm {
	// 	box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
	// }
</style>
