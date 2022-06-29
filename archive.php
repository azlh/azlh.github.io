<?php get_header(); ?>
<?php
$category = get_the_category();
if($category[0]) $id = $category[0]->term_id; $name = $category[0]->cat_name; $des = $category[0]->description;
?>

<div id="header_info">
    <nav class="header-nav reveal">
        
        <a class="top1 header-logo" style="text-decoration:none;" href="https://www.ouorz.com">XXXXX</a>
        <p class="top2 lead archive-p">XXXXXXXXXXXXXXXXXXXXXXXXXXX</p>
        
        <div class="btn-group" style="margin-top: -77px;margin-left: 180px;">
            <button type="button" class="btn btn-primary"><a href="https://www.ouorz.com/" style="text-decoration:none;color:white"><i class="czs-hand-slide" style="margin-right:5px" ></i>回到首页</a></button>
        </div>
    </nav>
    <div class="index-cates">
        <li class="cat-item cat-item-4 cat-real" style="display:none" v-for="de in des" v-if="de.count !== 0"> <a :href="de.link" :title="de.description">{{ de.name }}</a>
        </li>
        <li class="cat-item cat-item-4" style="display: inline-block;width: 98%;height: 35px;box-shadow: none;border-radius: 0px;background: rgb(236, 237, 239);" v-if="loading_des"></li>
    </div>
</div>














                    <ul class="article-list" style="opacity:0">
    
    <!-- 占位DIV -->
    <!-- <li v-if="loading" uk-scrollspy="cls:uk-animation-slide-left-small" class="article-list-item reveal index-post-list uk-scrollspy-inview" style="padding: 50px 30px !important;"><div style="float: left;margin-right: 40px;margin-top: -10px;background: #eee;height: 100px;width: 100px;border-radius: 8px;"></div> <a href="https://www.zeo.im" style="text-decoration: none;"><h5 style="margin-top: 10px;background: #eee;height: 30px;width: 72%;float: right;"></h5></a> <p style="height: 20px;background: #eee;width: 72%;margin: 0px;float: right;"></p> <div class="article-list-footer">  <span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span></div></li> -->
    <li v-if="loading" uk-scrollspy="cls:uk-animation-slide-left-small" class="article-list-item reveal index-post-list uk-scrollspy-inview"><em class="article-list-type1" style="padding: 5.5px 45px;">&nbsp;</em>  <a style="text-decoration: none;"><h5 style="background: rgb(236, 237, 238);">&nbsp;</h5></a><p style="background: rgb(246, 247, 248);width: 90%;">&nbsp;</p><p style="background: rgb(246, 247, 248);width: 60%;">&nbsp;</p>
    </li>
    <!-- 占位DIV -->
    
    <li class="article-list-item reveal index-post-list" uk-scrollspy="cls:uk-animation-slide-left-small" v-for="post in posts" :style="post.post_categories[0].term_id | link_style"> 
    
        <em v-if="post.post_categories[0].term_id === 7" class="article-list-type1">{{ post.post_categories[0].name }}</em>
        <div v-if="post.post_categories[0].term_id === 2 || post.post_categories[0].term_id === 5" class="link-list-left"><img :src="post.post_metas.img[0]" class="link-list-img"></div>
        <div class="link-list-right">
            <a v-if="post.post_categories[0].term_id === 2 || post.post_categories[0].term_id === 5" :href="post.post_metas.link" style="text-decoration: none;"><h5 style="margin-top: 10px;" v-html="post.title.rendered"></h5></a>
            <a v-else :href="post.link" style="text-decoration: none;"><h5 v-html="post.title.rendered"></h5></a>
            <p v-html="post.post_excerpt"></p>
        <div class="article-list-footer"> 
            <span class="article-list-date" style="color: #ada8a8;">{{ post.post_categories[0].term_id | link_page }}{{ post.post_date }}</span>
            <span class="article-list-divider" v-if="post.post_categories[0].term_id !== 2 && post.post_categories[0].term_id !== 5">-</span>
            <span class="article-list-minutes" v-if="post.post_categories[0].term_id !== 2 && post.post_categories[0].term_id !== 5">{{ post.post_metas.views }}&nbsp;Views</span>
        </div>
        </div>
    </li>

    
    <!-- 加载占位DIV -->
    <!-- <li uk-scrollspy="cls:uk-animation-slide-left-small" class="article-list-item reveal index-post-list uk-scrollspy-inview bottom" style="padding: 50px 30px !important;"><div style="float: left;margin-right: 40px;margin-top: -10px;background: #eee;height: 100px;width: 100px;border-radius: 8px;"></div> <a href="https://www.zeo.im" style="text-decoration: none;"><h5 style="margin-top: 10px;background: #eee;height: 30px;width: 72%;float: right;"></h5></a> <p style="height: 20px;background: #eee;width: 72%;margin: 0px;float: right;"></p> <div class="article-list-footer">  <span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span><span class="article-list-minutes">&nbsp;</span></div></li> -->
    <li uk-scrollspy="cls:uk-animation-slide-left-small" class="article-list-item reveal index-post-list uk-scrollspy-inview bottom"><em class="article-list-type1" style="padding: 5.5px 45px;">&nbsp;</em>  <a style="text-decoration: none;"><h5 style="background: rgb(236, 237, 238);">&nbsp;</h5></a><p style="background: rgb(246, 247, 248);width: 90%;">&nbsp;</p><p style="background: rgb(246, 247, 248);width: 60%;">&nbsp;</p>
    </li>
    <!-- 加载占位DIV -->
    
    <!-- 加载按钮 -->
    <button @click="new_page" id="scoll_new_list" style="opacity:0"></button>
    <!-- 加载按钮 -->
</ul>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
<script>
window.onload = function(){ //避免爆代码
        
        var click = 0; //初始化加载次数
        var paged = 1; //获取当前页数
        var incate = <?php echo $id; ?>;
        
        /* 展现内容(避免爆代码) */
        $('.article-list').css('opacity','1');
        $('.top1').html('<?php echo $name; ?>');
        $('.top2').html('<?php echo $des; ?>');
        $('.cat-real').attr('style','display:inline-block');
        /* 展现内容(避免爆代码) */
        
        new Vue({ //axios获取顶部信息
            el : '#grid-cell',
            data() {
                return {
                    posts: null,
                    cates: null,
                    des: null,
                    loading: true, //v-if判断显示占位符
                    loading_des: true,
                    errored: true
                }
            },
            mounted () {
                     //获取分类
                     axios.get('https://www.ouorz.com/wp-json/wp/v2/categories?exclude=1')
                     .then(response => {
                         this.des = response.data;
                     }).finally(() => {
                        this.loading_des = false;
                     });
                
                //获取文章列表
                axios.get('https://www.ouorz.com/wp-json/wp/v2/posts?per_page=10&page='+paged+'&categories='+incate)
                 .then(response => {
                     this.posts = response.data
                 })
                 .catch(e => {
                     this.errored = false
                 })
                 .finally(() => {
                     this.loading = false;
                     paged++; //加载完1页后累加页数
                    //加载完文章列表后监听滑动事件
                    $(window).scroll(function(){
　　                    var scrollTop = $(window).scrollTop();
　　                    var scrollHeight = $('.bottom').offset().top - 500;
　　                    if(scrollTop >= scrollHeight){
　　                        if(click == 0){ //接近底部加载一次新文章
　　　　                        $('#scoll_new_list').click();
　　　　                        click++; //加载次数计次
　　                        }
　　                    }
                    });
                    
                })
            },
            methods: { //定义方法
                new_page : function(){ //加载下一页文章列表
                    axios.get('https://www.ouorz.com/wp-json/wp/v2/posts?per_page=10&page='+paged+'&categories='+incate)
                 .then(response => {
                     if(response.data.length !== 0){ //判断是否最后一页
                         this.posts.push.apply(this.posts,response.data); //拼接在上一页之后
                         click = 0;
                         paged++;
                     }else{
                         $('.bottom h5').html('暂无更多文章了 O__O "…').css({'background':'#fff','color':'#999'});
                     }
                 })
            }
                },
            filters: {
                link_page : function(cate_id){
                    if(cate_id == 2){
                        return '添加于 ';
                    }else if(cate_id == 5){
                        return '创造于 ';
                    }else{
                        return '';
                    }
                },
                link_style : function(cate_id){
                    if(cate_id == 2 || cate_id == 5){
                        return 'display: flex;';
                    }else{
                        return '';
                    }
                }
            }
        });
        
        
}
</script>            
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
<?php get_footer(); ?>