/**
 * API接口配置文件
 */
module.exports = {
	home : {				
		getall:"get_all_colleague",//首页获取全部职员
		get_colleague:"get_colleague?id=",	//获取职员
		updataColleague :"edit_coll", //修改员工基本信息
		Systeam :"get_all_systeam",	//获取公共配置
		Systeam2 :"get_all_systeam2",	//获取公共配置 key:value
		OtherColleague:"get_other_colleague?id=",		//获取同事
		Article : "get_all_article",	//获取文章
		getPone: "getWxMobile",		//授权手机号
		token :"get_token",			//用户获取token
		UserInfo : "user_info",		//获取用户id
		AccessPhone : "get_all_userphone" ,//访问用户号码
		countUser : "statistics_count?cid=",
		getone:"get_f_colleague",
		allColleague : "get_all_colleague",	//获取所有职员
		Login : "add_login",	//记录用户访问
		upload : "uploadImg" ,//修改职员头像
		get_mine:"get_my_user",
		ed_state:"ed_state",
		get_banner:"get_all_banner"
	} ,
	article:{
		articleContent : "get_art?id="
	},
	img:{
		upload_img:"upload_img"
	},
	coll:{
		get_mine:"get_mine"
	}
}

 