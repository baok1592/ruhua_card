<template>
	<view class="top">
		<view class="model">
			<b class="size">公司新闻</b>
		</view>
		<view class="model-tow" v-if="article_title_data">
			<view @click="handleArticle(item)" class="model-litter shadow" v-if="item['type'] == 3 "
				v-for="(item,index) in article_title_data" :key="item.id">
				<view class="model-litter-l">
					<img :src="item['img_url']" class="img" />
				</view>
				<view class="model-litter-one">
					<view class="text">
						<span class="size-tow">{{item['title']}}</span>
					</view>
					<view class="data">{{item['create_time']}}</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		props: ['article_title_data'],
		data() {
			return {}
		},
		methods: {
			handleArticle: function(item) {
				uni.navigateTo({
					url: "/pages/index/Article/Article?id=" + item['id']
				})
			}
		}
	}
</script>

<style lang="scss" scoped>
	.top {
		display: flex;
		flex-direction: column;
		align-items: center;
		width: 100%;
		margin-top: 10px;
		margin-bottom: 20px;
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

	.model-tow {
		display: flex;
		flex-direction: column;
		width: 95%;
		height: 40vm;
	}

	.model-litter {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 120px;
		width: 100%;
		margin-top: 15px;
		// box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
	}

	.img {
		width: 100%;
		height: 100%;
	}

	.model-litter-one {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		width: 65%;
		height: 90%;
		margin-left: 15px;

	}

	.size-tow {
		padding-top: 10px;
		font-size: 14px;
	}

	.model-litter-l {

		overflow: hidden;
		width: 30%;
		height: 90%;
		display: flex;
		align-items: center;
		margin: 5px 0px 5px 5px;
	}

	.text {
		width: 95%;
		height: 60%;
	}

	.data {

		width: 95%;
		padding-top: 20px;
		font-size: 10px;
		color: #555555;
	}

	.shadow {
		box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
	}

	.shadow-sm {
		box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
	}
</style>
