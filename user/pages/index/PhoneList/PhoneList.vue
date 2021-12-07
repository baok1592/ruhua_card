<template>
	<view>
		<view class="tow">
			<u-icon name="arrow-left" @click="back"></u-icon></view>
		<view class="top" v-if="data_allcolleague">
			<u-cell-group>
				<u-cell-item title="联系人电话" :arrow="false" :center="true" :value="'未处理人数:' + f_counts">
				</u-cell-item>
			</u-cell-group>
			<u-cell-group v-for="(item,index) in data_allcolleague" :key="index">
				<u-cell-item v-if="item.state==0" :title="item['user']['u_phone']" :arrow="false"
					:value="item['create_time']">
					<u-switch class="switch" slot="right-icon" v-model="item.state"></u-switch>
				</u-cell-item>
				<u-cell-item v-if="item.state==1" :title="item['user']['u_phone']" :arrow="false"
					:value="item['create_time']">
					<u-switch class="switch" slot="right-icon" v-model="item.state"></u-switch>
				</u-cell-item>

			</u-cell-group>

		</view>
		<u-button type="primary" size="medium" style="padding-top: 20%;margin-left: 35%;" @click="save">保存</u-button>
	</view>

</template>

<script>
	export default {
		data() {
			return {
				data_allcolleague: "",
				cid: "",
				counts: "",
				f_counts: "",
				data: [],
			}
		},
		onLoad(op) {
			this.cid = op.id
			this.get_colleague_allphone();
			uni.setNavigationBarTitle({
				title: '电话列表'
			});
		},
		methods: {
			save() {

				this.$http.post(this.$api.home.ed_state, this.data_allcolleague).then(res => {
					uni.showToast({
						title: '状态已修改',
						icon: 'success'
					})
					this.get_colleague_allphone();
				})
			},
			get_colleague_allphone() {

				this.$http.get(this.$api.home.get_mine, {
					cid: this.cid
				}).then(res => {
					this.data_allcolleague = res.data;
					let n = 0
					for (let j = 0; j < res.data.length; j++) {
						if (res.data[j]['state'] == 1)
							n++
					}
					this.f_counts = res.data.length - n
				})
			},
			back(){
				uni.navigateBack()
			}

		}
	}
</script>

<style lang="scss" scoped>
	.top {
		background-color: $bgcolro;
	}

	.switch {
		margin-left: 10px;
	}

	.tow {
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		width: 40px;
		height: 40px;
		background-color: #808080;
		font-size: 15px;
		color: #000000;
		position:fixed;
		margin: 10px;
	}

	.model {
		border-bottom: solid 2px #bcbcbc;
		height: 50px;
	}

	.size {
		font-size: 20px;
	}

	.model-litter {
		border-bottom: solid 2px #bcbcbc;
		height: 50px;
		margin-top: 15px;
	}

	.model-left {
		font-size: 20px;
		color: #000000;
	}

	.model-right {
		margin-left: 50px;
		font-size: 15px;
		color: #d3d3d3;
	}
</style>
