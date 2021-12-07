<template>
	<view class="header">
		<view class="header1 iconfont">
			<view class="header1-left" v-if = "user_data.himg_url">
				<img :src="user_data.himg_url" class="img" />
			</view>
			<view class="header1-rigt">
				<view class="size-top1" v-if="sys_data">
					{{sys_data['company']}}
				</view>
				
					<view class="size-top2" v-if ="user_data.name">
						<b>
							{{user_data.name}}
						</b>
					</view>
					<view class="size-top21" v-if ="user_data.name">
						
						<view class="size-top3" v-if="user_data.position">
							<span class="gloa-color"><u-icon name="account"></u-icon>
								<text class="litter">{{user_data.position}}</text>
							</span>
						</view>
					</view>
				
				
				
				<view class="model-three">
					<view class="size-top3" v-if="user_data.phone">
						<span class="gloa-color">&#xe64f;
							<text class="litter">{{user_data.phone}}</text>
						</span>
					</view>
					<view class="size-top3" v-if="user_data.email">
						<span class="gloa-color"><u-icon name="email"></u-icon>
						<text class="litter">{{user_data.email}}</text>
						</span>
					</view>
					<view class="size-top3"  v-if="sys_data">
						<span class="gloa-color">&#xe602;
							<text class="litter">{{sys_data['addrss']}}</text>
						</span>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default{
		props:['user_data','sys_data'],
		data(){
			return {	
			}
		},
	}
</script>

<style lang="scss" scoped>
	
.header{
	display: flex;
	justify-content:center;
	align-items:center;
	height: 220px;
}
 .header1{
	 display: flex;
	 justify-content:flex-start;
	 height: 90%;
	 width: 95%;
	 border-radius: 10px;
	box-shadow:2px 2px 5px #000;
}
.header1-left{
	display: flex;
	justify-content:center;
	align-items:center;
	width: 40%;
	height: 100%;
	 border-radius: 10px;
	background-color: $bgcolro;
}
.img{
	border-radius:50%;
	width: 130px;
	height: 130px;
}
.header1-rigt{
	display: flex;
	flex-direction: column;
	width: 60%;
}
.size-top1{
	font-size: 14px;
	color: $bgcolro;
	margin-top: 10px;
	margin-left: 10px;
	height: 10%;
	width: 100%;
}
.size-top2{
	white-space: nowrap;
	overflow: hidden;
	display: flex;
	align-items: center;
	margin-top: 20px;
	margin-left: 5px;
	font-size: 25px;
	height: 20%;
	width: 90%;
}
.size-top21{
	
}
.model-three{
	display: flex;
	flex-direction: column;
	height: 50%;
	width: 100%;
}
	.size3{
		
		font-size: 12px;
		margin-left: 20px;
	}
.size-top3{
	font-size: 14px;
	margin-left: 10px;
	margin-top: 10px;
}
 .header-left{
	 display: flex;
	 justify-content:center;
	 align-items:center;
	 width: 50%;
	 flex-direction:row;
	 
	 
 }
 .gloa-color{
	 color: $bgcolro;
 }
 .litter{
	 color: #000000;
	 margin-left: 5px;
	 margin-top: 8px;
 }
</style>
