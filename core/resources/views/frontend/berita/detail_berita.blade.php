@extends('frontend.layouts.master')
@section('content')
<body class="header-sticky">   
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading...</h2>
        </div>
    </section>
    
    <!-- Boxed -->
    <div class="boxed">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flat-address">        
                            <ul>
                                <li class="address">66 Nicholson St Buffalo New York Us</li>                            
                            </ul>
                        </div><!-- /.flat-address -->
                    </div><!-- /.col-md-6 -->   
                    <div class="col-md-6">
                        <div class="top-navigator">        
                            <ul>
                                <li><a href="#">About</a></li>
                                <li class="service"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services-architectural-planning.html">Architectural Planning</a></li>
                                        <li><a href="services-decoration-furniture.html">Decoration &amp; Furniture</a></li>
                                        <li><a href="services-interior-design.html">Interior Design</a></li>
                                        <li><a href="services-landscape-design.html">Landscape Design</a></li>
                                        <li><a href="services-sustainable-design.html">Sustainable Design</a></li>
                                        <li><a href="services-urban-design.html">Urban Design</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div><!-- /.top-navigator -->
                    </div><!-- /.col-md-6 -->              
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top -->


        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h1 class="title">Judul Berita</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="#">Detail Berita</a></li>
                                </ul>                   
                            </div>
                        </div><!-- /.page-title-captions --> 
                        
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /.page-title -->

        <div class="main-content blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="content-wrap">
                            <div class="main-content-wrap">
                                <article class="post">
                                    <div class="feature-post blog-slider">
                                        <img src="{{ asset('assets/frontend/images/blog/b3.jpg')}}" alt="image">
                                    </div><!-- /.feature-post -->

                                    <div class="header-post">
                                        <p class="time-post">December 18, 2015</p>
                                        <h2 class="title-post">The calibre of the art hints at the creative</h2>
                                    </div><!-- /.header-post -->

                                    <div class="content-post">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
                                        <blockquote><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p></blockquote>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.</p>
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text.</p>
                                        <p><img class="alignnone" src="images/blog/bs1.jpg" alt="images"></p>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.</p>
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text</p>
                                        
                                        <div class="meta-post">
                                            <span>By</span>
                                            <span><a href="#">linethemes</a></span>
                                            <span>in</span>
                                            <span><a href="#">Architecture </a></span>
                                            <span class="comments-link"><a href="#">0</a></span>
                                        </div>
                                        
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                            </div><!-- /.main-content-wrap -->

                            <nav class="navigation post-navigation">
                                <ul class="nav-links">
                                    <li class="previous-post">
                                        <a href="#">
                                            <span class="meta-nav">Previous Post </span>Anglepoise Salone del Mobile</a>
                                    </li>
                                    <li class="next-post"><a href="#"><span class="meta-nav">Next Post</span> Paris guide launch event</a>
                                    </li>  
                                </ul><!-- /.nav-links -->
                            </nav>

                            <div class="comments-area">
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Leave a Reply</h3>
                                <form class="comment-form">
                                    <p class="comment-notes"><span>Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>

                                    <p class="comment-form-comment"><label>Comment</label> <textarea name="comment" required="required"></textarea></p>
                                    <p class="comment-form-author"><label>Name <span class="required">*</span></label> <input name="author" type="text" value="" required="required"></p>

                                    <p class="comment-form-email"><label>Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="" required="required"></p>

                                    <p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value=""></p>

                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
                                    </p>
                                </form>
                            </div><!-- /.comment-respond -->
                        </div><!-- /.comments-area -->
                        </div><!-- /.content-wrap -->                        
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="sidebars">
                            <div class="sidebars-wrap">
                                <div class="sidebar">
                                    <div class="widget widget_search">
                                        <form class="search-form">
                                            <input type="search" class="search-field" placeholder="Search …">
                                            <input type="submit" class="search-submit">
                                        </form>
                                    </div><!-- /.widget_search -->

                                    <div class="widget widget_categories">
                                        <h3 class="widget-title">Categories</h3>
                                        <ul>
                                            <li class="cat-item"><a href="#">Architecture</a></li>
                                            <li class="cat-item"><a href="#">Decoration</a></li>
                                            <li class="cat-item"><a href="#">Home Building</a></li>
                                            <li class="cat-item"><a href="#">Interior</a></li>
                                        </ul>
                                    </div><!-- /.widget_categories -->

                                    <div class="widget widget_recent_entries">
                                        <h3 class="widget-title">Recent Posts</h3>
                                        <ul>
                                            <li><a href="#">Paris guide launch event</a></li>
                                            <li><a href="#">The calibre of the art hints at the creative</a></li>
                                            <li><a href="#">Anglepoise Salone del Mobile</a></li>
                                            <li><a href="#">A limited edition Agnes Martin cover</a></li>
                                            <li><a href="#">Nakashima – woodworker</a></li>
                                        </ul>
                                    </div><!-- /.widget_recent_entries -->

                                    <div class="widget widget_tag_cloud">
                                        <h3 class="widget-title">Tags</h3>
                                        <div class="tagcloud">
                                            <a href="#">Building</a>
                                            <a href="#">Cover</a>
                                            <a href="#">Decor</a>
                                            <a href="#">Interior</a>
                                        </div>
                                    </div><!-- /.widget_tag_cloud -->
                                </div><!-- .sidebar -->
                            </div><!-- /.sidebars-wrap -->
                        </div><!-- /.sidebars -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-content -->
            @endsection