<template>
	<view class="top">
		<view   class="model" >
			<b class="size" >公司其他成员</b>
		</view>
		
		<view class="model-tow shadow" >
			<scroll-view class="uni-swiper-tab" scroll-x :style="'height:'+'px'">
				<view class="model-litter shadow" v-if="user_other" v-for="(item,index) in user_other " :key="item.id" @click="see(item.id)">
					<image :src="item['himg_url']" class="img" style="height:125px;width: 125px;border-radius: 50%"></image>
					<view style="margin-bottom: 10px;">
						<b class="size-tow" v-if="user_other">
							{{item['name']}}
						</b>
						<view>
							<p class="size-three" v-if="user_other">
								{{item['position']}}
							</p>
						</view>
					</view>
				</view>
			</scroll-view>
		</view>
	</view>
</template>

<script>
	export default {
		props: ['user_other', 'sys_data'],
		data() {
			return {}
		},
		methods: {
			see(id) {
				console.log('id',id)
				uni.navigateTo({
					url: '../index/othercoll?id='+id
				})
			}
		}
	}
</script>

<style lang="scss" scoped>
	.top {
		margin-top: 10px;
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-bottom: 10px;
	}

	.model {
		display: flex;
		align-items: center;
		width: 95%;
		height: 50px;
		background-color: $bgcolro;
	}

	.size {
		font-size: 18px;
		margin: 10px auto;
		color: #ffffff;
	}

	.model-tow {
		margin-top: 10px;
		margin-left: 0px;
		width: 100%;
		height:90%;
		display: flex;
		justify-content: space-between;
		align-items: center;

	}

	.model-litter {
		margin-left: 10px;
		width: 40%;
		height: 90%;
		align-items: center;
		flex-direction: column;
		display: inline-block;
		text-align: center;
	}

	.img {
		width: 125px;
		height: 150px;
	}

	.size-tow {
		margin-top: 5px;
		font-size: 14px;
	}

	.size-three {
		margin-top: 5px;
		font-size: 12px;
		color: #82848A;
	}

	.size-id {}

	.uni-swiper-tab {
		white-space: nowrap;
	}
</style>
