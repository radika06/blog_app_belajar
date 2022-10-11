@extends ('blog.post.master')
@section ('konten') 
<!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('')}}blog2/assets/img/dugong.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <?php foreach ($posts as $row) { ?>
                                <h1>
                                <?php echo $row->title; ?></h1>
                            
                                                        <span class="meta">
                                Posted by
                                <a href="#!">LeoG07</a>
                                on October 04, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                            <p><?php echo $row->content; ?></p>
                            <br>
                            <?php } ?>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">LeoG07 Berita-man</a>
                            &middot; Images by
                            <a href="https://pict.sindonews.net/size/640/salsabila/slider/2022/08/17697/ilmuwan-umumkan-dugong-telah-punah-di-china-wxb.jpg">Del Esshole on The Commons</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
@endsection   