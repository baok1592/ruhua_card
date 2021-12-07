<template>
	<view class="top" v-if="form">
		<view class="tow">
			<u-icon name="arrow-left" @click="back"></u-icon></view>
		<view class="model" v-if="data">
			<view class="healde">
				<img class="img" :src="data['himg_url']" />
			</view>
		</view>
		
			<view class="model-liter" style="margin-top: 5px;">
				
					
					<u-upload  @on-success="upload2"  name="img" max-count="1" :action="action"  ></u-upload>
					
			</view>
			<view style="margin-top: 5px;margin-left: 45%;">新头像</view>
			<view class="model-liter">
				<view class="input-litte">
					<view class="size-one">姓名:</view>
					<input class="input" v-model="form.name" />
					</view>
			</view>
			<view class="model-liter">
				<view class="input-litte">
					<view class="size-one">电话:</view>
					<input class="input" v-model="form.c_phone" />
					</view>
			</view>
			<view class="model-liter">
				<view class="input-litte">
					<view class="size-one">微信号:</view>
					<input class="input" v-model="form.wechart_nub" />
					</view>
			</view>
			<view class="model-liter">
				<view class="input-litte">
					<view class="size-one">电子邮件:</view>
					<input class="input" v-model="form.email" />
					</view>
			</view>
			
				<button type="primary" class="button" @click="updataColleague">修改资料</button>		
	</view>
</template>

<script>
	import {Api_url} from  '../../../common/config.js'
	export default {
		data() {
			return {
				id:"",
				data:"",
				action:"http://192.168.0.184:8098/upload_img",
				form : {
					himg_url:"",
					name:"",
					c_phone:"",
					wechart_nub:"",
					email:"",
					content:""	
				}
			}
		},
		onLoad(option){
			this.get_colleague()
			uni.setNavigationBarTitle({
			    title: '个人信息修改'
			});
		},
		onShow(){
		},
		methods: {
			upload2(res) {
				
				this.form.himg_url = res.data.url;
			
			},
			get_colleague(){
				this.$http.get(this.$api.coll.get_mine).then(res=>{			
				let form = {				
					himg_url:res.data['himg_url'],
					name:res.data['name'],
					c_phone:res.data['c_phone'],
					wechart_nub:res.data['wechart_nub'],
					email:res.data['email'],
					content:res.data['content']	
				};
				this.form = form;
				this.data = res.data;
				})
			},
			updataColleague(){
				this.$http.post(this.$api.home.updataColleague,this.form).then(res=>{
					uni.showToast({
						title:'修改成功',
						icon:'success'
					})
					
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
		display: flex;
		flex-direction: column;
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
	 .model{
		 height: 200px;
		 background-color: $bgcolro;
	 }
	  .healde{
		  width: 100%;
		  height: 100%;
		  display: flex;
		  align-items: center;
		  justify-content: center;
	  }
	  .model-liter{
		  display: flex;
		  justify-content: center;
		  align-items: center;
	  }
	  .img{
		  border-radius:50%;
		  height: 80%;
		  width: 40%;
	  }
	  .input-litte{
		  display: flex;
		  align-items: center;
		  background-color: #f4f4f5;
		  border-radius: 15px;
		  margin-top: 15px;
		  height: 50px;
		  width: 90%;
	  }
	    .input{
			height: 50px;
			margin-left: 20px;
		}
		.size-one{
			font-size: 15px;
			margin-left: 10px;
		}
	.button{
		width: 40%;
		
		margin-top: 30px;
		margin-bottom: 10px;
		
	}
	.u-demo-wrap {
		background-color: #FFFFFF;
		padding: 40rpx 8rpx;
		margin-left: -14rpx;
		margin-right: -14rpx;
	}
	
	.u-add-wrap {
		flex-direction: column;
		color: $u-content-color;
		font-size: 28rpx;
	}
	
.slot-btn {
		width: 329rpx;
		height: 140rpx;
		display: flex;
		justify-content: center;
		align-items: center;
		background: rgb(244, 245, 246);
		border-radius: 10rpx;
	}
	
	.slot-btn__hover {
		background-color: rgb(235, 236, 238);
	}
	
	.pre-box {
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-wrap: wrap;
	}
	
	.pre-item {
		flex: 0 0 48.5%;
		border-radius: 10rpx;
		height: 140rpx;
		overflow: hidden;
		position: relative;
		margin-bottom: 20rpx;
	}
	
	.u-progress {
		position: absolute;
		bottom: 10rpx;
		left: 8rpx;
		right: 8rpx;
		z-index: 9;
		width: auto;
	}
	
	.pre-item-image {
		width: 100%;
		height: 140rpx;
	}
	
	.u-delete-icon {
		position: absolute;
		top: 10rpx;
		right: 10rpx;
		z-index: 10;
		background-color: $u-type-error;
		border-radius: 100rpx;
		width: 44rpx;
		height: 44rpx;
		display: flex;
		align-items: center;
		justify-content: center;
	}

</style>
