(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-00340e88"],{"52f0":function(t,e,i){"use strict";i("be99")},be99:function(t,e,i){},c2f4:function(t,e,i){"use strict";i.r(e);var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"root"},[i("el-page-header",{attrs:{content:"修改文章"},on:{back:t.goBack}}),i("el-container",[i("el-main",[i("transition",{attrs:{appear:"","appear-active-class":"animated fadeInLeft"}},[i("div",{staticClass:"article"},[i("div",{staticStyle:{height:"20px"}},[t._v(" ")]),[i("el-row",[i("el-col",{attrs:{span:16}},[i("el-form",{attrs:{model:t.form,"label-width":"120px"}},[i("el-form-item",{attrs:{label:"文章标题","label-width":t.formLabelWidth}},[i("el-input",{attrs:{"auto-complete":"off"},model:{value:t.form.title,callback:function(e){t.$set(t.form,"title",e)},expression:"form.title"}})],1),i("el-form-item",{attrs:{label:"类型","label-width":t.formLabelWidth}},[i("el-select",{staticStyle:{width:"150px"},model:{value:t.form.type,callback:function(e){t.$set(t.form,"type",e)},expression:"form.type"}},t._l(t.options,(function(t){return i("el-option",{key:t.value,attrs:{label:t.label,value:t.value}})})),1)],1),i("el-form-item",{attrs:{label:"文章缩略图","label-width":t.formLabelWidth}},[[i("el-image",{staticStyle:{width:"300px",height:"300px"},attrs:{shape:"square",size:100,src:t.form.img_url}}),i("el-upload",{staticClass:"upload-demo",attrs:{action:"action","list-type":"picture",name:"img","auto-upload":!0,"on-success":t.success,limit:4},model:{value:t.form.img_url,callback:function(e){t.$set(t.form,"img_url",e)},expression:"form.img_url"}},[i("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")]),i("div",{staticClass:"el-upload__tip",attrs:{slot:"tip"},slot:"tip"},[t._v("只能上传jpg/png文件，且不超过500kb,推荐像素大小为500*300")])],1)]],2),i("el-form-item",{attrs:{label:"文章简介","label-width":t.formLabelWidth}},[i("el-input",{staticStyle:{width:"70%"},attrs:{type:"textarea"},model:{value:t.form.description,callback:function(e){t.$set(t.form,"description",e)},expression:"form.description"}})],1),i("el-form-item",{attrs:{label:"文章内容","label-width":t.formLabelWidth}},[i("vue-ueditor-wrap",{attrs:{config:t.myConfig},model:{value:t.form.content,callback:function(e){t.$set(t.form,"content",e)},expression:"form.content"}})],1)],1),i("div",{staticClass:"dialog-footer"},[i("el-button",{attrs:{type:"primary"},on:{click:function(e){return t.sub_edit("form")}}},[t._v("修 改")])],1)],1)],1)]],2)])],1)],1)],1)},o=[],l=i("6625"),r=i.n(l),s=i("a49b"),n={data:function(){return{action:s["a"]+"/upload_img",myConfig:{autoHeightEnabled:!1,initialFrameHeight:420,initialFrameWidth:"100%",serverUrl:"get_ue",UEDITOR_HOME_URL:"static/UEditor/",toolbars:[["justifyleft","justifycenter","justifyright","justifyjustify","bold","forecolor","fontsize","source","insertimage"]]},id:"",options:[{value:1,label:"公司图集"},{value:2,label:"公司产品"},{value:3,label:"公司新闻"}],form:{id:"",aid:"",type:"",description:"",title:"",content:"",img_url:""},formLabelWidth:"120px"}},components:{VueUeditorWrap:r.a},mounted:function(){this.getroute(),this._load()},methods:{goBack:function(){this.$router.go(-1)},getroute:function(){var t=this.$route.query;this.form.id=t.id},_load:function(){var t=this;this.http.get(this.$api.art.getonly+this.form.id).then((function(e){t.form.title=e.data.title,t.form.type=e.data.type,t.form.img_url=e.data.img_url,t.form.description=e.data.description,t.form.content=e.data.content}))},success:function(t){console.log("res",t),this.form.img_url=t.data.url},sub_edit:function(){var t=this;console.log("f",this.form),this.http.post(this.$api.art.edit,this.form).then((function(e){t.$message({type:"success",message:"修改成功!"})})),this.goBack(),this.$forceUpdate()}}},c=n,u=(i("52f0"),i("2877")),f=Object(u["a"])(c,a,o,!1,null,null,null);e["default"]=f.exports}}]);