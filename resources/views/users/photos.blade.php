@extends('website.website')
@section('head')
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="https://html.crumina.net/html-olympus/css/fonts.min.css">
	<link rel="stylesheet" href="/styles/users.css" />
@endsection
@section('scripts')
    <!-- JS Scripts -->
    <script src="https://html.crumina.net/html-olympus/js/jQuery/jquery-3.5.1.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/jquery.appear.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/jquery.mousewheel.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/perfect-scrollbar.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/svgxuse.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/imagesloaded.pkgd.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/Headroom.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/popper.min.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/material.min.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/bootstrap-select.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/smooth-scroll.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/selectize.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/swiper.jquery.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/moment.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/daterangepicker.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/isotope.pkgd.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/ajax-pagination.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/jquery.magnific-popup.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/aos.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs/purecounter_vanilla.js"></script>
    
    <script src="/js/crumina-main.js"></script>
    <script src="https://html.crumina.net/html-olympus/js/libs-init/libs-init.js"></script>
    <script defer src="https://html.crumina.net/html-olympus/fonts/fontawesome-all.js"></script>
    
    <script src="https://html.crumina.net/html-olympus/Bootstrap/dist/js/bootstrap.bundle.js"></script>
    
    <!-- SVG icons loader -->
    <script src="https://html.crumina.net/html-olympus/js/svg-loader.js"></script>
    <!-- /SVG icons loader -->
    <script src="/alljs/users_photos.js"></script>
@endsection

@section('content')
    <!-- Top Header-Profile -->
    <div class="inner">
        @include('inc.users-menu')
    
        <!-- ... end Top Header-Profile -->
        
        
        <div class="container-fluid">
        	<div class="row">
        		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        			<div class="ui-block responsive-flex">
        				<div class="ui-block-title">
        					<div class="h6 title">{{ $user->namef() }} - Фотогалерея</div>
                            
            				<div class="block-btn align-right">
            				    @auth
                					<a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Создать альбом +</a>
                
                					<a href="#" data-toggle="modal" data-target="#update-header-photo" class="btn btn-md-2 btn-border-think custom-color c-grey">Добавить фотографии</a>
            					@else
            					    <a href="#" data-toggle="modal" data-target="" class="btn btn-md-2 btn-border-think custom-color c-grey" style="visibility:hidden;">Кнопка</a>
            				    @endauth
            				</div>
        					
        
        					<ul class="nav nav-tabs photo-gallery" role="tablist">
        						<li class="nav-item">
        							<a class="nav-link" data-toggle="tab" href="#photo-page" role="tab">
        								<svg class="olymp-photos-icon"><use xlink:href="#olymp-photos-icon"></use></svg>
        							</a>
        						</li>
        
        						<li class="nav-item">
        							<a class="nav-link active" data-toggle="tab" href="#album-page" role="tab">
        								<svg class="olymp-albums-icon"><use xlink:href="#olymp-albums-icon"></use></svg>
        							</a>
        						</li>
        
        					</ul>
        					<?php /*
        					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        					*/?>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    
        <div class="container-fluid">
        	<div class="row">
        		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        			<!-- Tab panes -->
        			<div class="tab-content">
        				<div class="tab-pane" id="photo-page" role="tabpanel">
        
        					<div class="photo-album-wrapper">
        
        						<div class="photo-item half-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item1.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item2.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item3.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item4.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item5.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item6.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item7.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item8.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item9.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item10.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        
        						
        						<div class="photo-item col-4-width">
        							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item11.jpg" alt="photo">
        							<div class="overlay overlay-dark"></div>
        							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        							<a href="#" class="post-add-icon inline-items">
        								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
        								<span>15</span>
        							</a>
        							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
        							<div class="content">
        								<a href="#" class="h6 title">Header Photos</a>
        								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
        							</div>
        						</div>
        						
        
        						<a href="#" class="btn btn-control btn-more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
        
        					</div>
        
        				</div>
        
        				<div class="tab-pane active" id="album-page" role="tabpanel">
        
        					<div class="photo-album-wrapper">
                                @auth
            						<div class="photo-album-item-wrap col-4-width" >
            							
            							<div class="photo-album-item create-album">
            							
            								<a href="#" data-toggle="modal" data-target="#create-photo-album" class="  full-block"></a>
            							
            								<div class="content">
            							
            									<a href="#" class="btn btn-control bg-primary" data-toggle="modal" data-target="#create-photo-album">
            										<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
            									</a>
            							
            									<a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Создать альбом</a>
            									<span class="sub-title">Это займет вего несколько минут!</span>
            							
            								</div>
            							
            							</div>
            						</div>
        						@endauth
                                
                                
                                
                                @foreach($wallalbums as $wallalbum)
                                    <div class="photo-album-item-wrap col-4-width">
            							<div class="photo-album-item">
            								<div class="photo-item">
            									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/photo-item2.jpg" alt="photo">
            									<div class="overlay overlay-dark"></div>
            									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
            									<a href="#" class="post-add-icon">
            										<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
            										<span>324</span>
            									</a>
            									<a href="#" data-toggle="modal" data-target="#album-{{ $wallalbum->id }}" class="  full-block"></a>
            								</div>
            							
            								<div class="content">
            									<a href="#" class="title h5">{{ $wallalbum->name }}</a>
            									<span class="sub-title">Последнее добавление: {!! $wallalbum->timeElapsedString() !!}</span>
            							
            									<div class="swiper-container">
            										<div class="swiper-wrapper">
            											<div class="swiper-slide">
            												<ul class="friends-harmonic">
            													<li>
            														<a href="#">
            															<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic5.jpg" alt="friend">
            														</a>
            													</li>
            													<li>
            														<a href="#">
            															<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic10.jpg" alt="friend">
            														</a>
            													</li>
            													<li>
            														<a href="#">
            															<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic7.jpg" alt="friend">
            														</a>
            													</li>
            													<li>
            														<a href="#">
            															<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic8.jpg" alt="friend">
            														</a>
            													</li>
            													<li>
            														<a href="#">
            															<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic2.jpg" alt="friend">
            														</a>
            													</li>
            												</ul>
            											</div>
            							
            											<div class="swiper-slide">
            												<div class="friend-count" data-swiper-parallax="-500">
            													<a href="#" class="friend-count-item">
            														<div class="h6">24</div>
            														<div class="title">Photos</div>
            													</a>
            													<a href="#" class="friend-count-item">
            														<div class="h6">86</div>
            														<div class="title">Comments</div>
            													</a>
            													<a href="#" class="friend-count-item">
            														<div class="h6">16</div>
            														<div class="title">Share</div>
            													</a>
            												</div>
            											</div>
            										</div>
            							
            										<!-- If we need pagination -->
            										<div class="swiper-pagination"></div>
            									</div>
            								</div>
            							
            			                </div>
            						</div>
                                @endforeach
        						
        						<div class="pagination">
        						    {!! $wallalbums->links() !!}
        						</div>
        
        					</div>
        
        				</div>
        			</div>
        
        		</div>
        	</div>
        </div>
    </div>
    
    
    
    
    
    <!-- Window-popup Open Photo Popup V1 -->
    
    <div class="modal fade modal-has-swiper" id="open-photo-popup-v1" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true">
    	<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">
    		<div class="modal-content">
    			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
    				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
    			</a>
    
    			<div class="modal-body">
    				<div class="open-photo-thumb">
    					<div class="swiper-container" data-slide="fade">
    						<div class="swiper-wrapper">
    
    							<div class="swiper-slide">
    								<div class="photo-item">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/open-photo1.jpg" alt="photo">
    									<div class="overlay"></div>
    									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
    									<a href="#" class="tag-friends" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
    										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
    									</a>
    
    									<div class="content">
    										<a href="#" class="h6 title">Photoshoot 2016</a>
    										<time class="published" datetime="2017-03-24T18:18">2 weeks ago</time>
    									</div>
    								</div>
    							</div>
    
    							<div class="swiper-slide">
    								<div class="photo-item">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/open-photo1.jpg" alt="photo">
    									<div class="overlay"></div>
    									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
    									<a href="#" class="tag-friends" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
    										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
    									</a>
    
    									<div class="content">
    										<a href="#" class="h6 title">Photoshoot 2016</a>
    										<time class="published" datetime="2017-03-24T18:18">2 weeks ago</time>
    									</div>
    								</div>
    							</div>
    
    							<div class="swiper-slide">
    								<div class="photo-item">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/open-photo1.jpg" alt="photo">
    									<div class="overlay"></div>
    									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
    									<a href="#" class="tag-friends" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
    										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
    									</a>
    
    									<div class="content">
    										<a href="#" class="h6 title">Photoshoot 2016</a>
    										<time class="published" datetime="2017-03-24T18:18">2 weeks ago</time>
    									</div>
    								</div>
    							</div>
    
    						</div>
    
    						<!--Prev Next Arrows-->
    
    						<svg class="btn-next-without olymp-popup-right-arrow"><use xlink:href="#olymp-popup-right-arrow"></use></svg>
    
    						<svg class="btn-prev-without olymp-popup-left-arrow"><use xlink:href="#olymp-popup-left-arrow"></use></svg>
    					</div>
    				</div>
    
    				<div class="open-photo-content">
    
    					<article class="hentry post">
    
    						<div class="post__author author vcard inline-items">
    							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/author-page.jpg" alt="author">
    
    							<div class="author-date">
    								<a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
    								<div class="post__date">
    									<time class="published" datetime="2017-03-24T18:18">
    										2 hours ago
    									</time>
    								</div>
    							</div>
    
    							<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
    								<ul class="more-dropdown">
    									<li>
    										<a href="#">Edit Post</a>
    									</li>
    									<li>
    										<a href="#">Delete Post</a>
    									</li>
    									<li>
    										<a href="#">Turn Off Notifications</a>
    									</li>
    									<li>
    										<a href="#">Select as Featured</a>
    									</li>
    								</ul>
    							</div>
    
    						</div>
    
    						<p>Here’s a photo from last month’s photoshoot. We really had a great time and got a batch of incredible shots for the new catalog.</p>
    
    						<p>With: <a href="#">Jessy Owen</a>, <a href="#">Marina Valentine</a></p>
    
    						<div class="post-additional-info inline-items">
    
    							<a href="#" class="post-add-icon inline-items">
    								<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
    								<span>148</span>
    							</a>
    
    							<ul class="friends-harmonic">
    								<li>
    									<a href="#">
    										<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic7.jpg" alt="friend">
    									</a>
    								</li>
    								<li>
    									<a href="#">
    										<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic8.jpg" alt="friend">
    									</a>
    								</li>
    								<li>
    									<a href="#">
    										<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic9.jpg" alt="friend">
    									</a>
    								</li>
    								<li>
    									<a href="#">
    										<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic10.jpg" alt="friend">
    									</a>
    								</li>
    								<li>
    									<a href="#">
    										<img loading="lazy" src="https://html.crumina.net/html-olympus/img/friend-harmonic11.jpg" alt="friend">
    									</a>
    								</li>
    							</ul>
    
    							<div class="names-people-likes">
    								<a href="#">Diana</a>, <a href="#">Nicholas</a> and
    								<br>13 more liked this
    							</div>
    
    
    							<div class="comments-shared">
    								<a href="#" class="post-add-icon inline-items">
    									<svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>
    									<span>61</span>
    								</a>
    
    								<a href="#" class="post-add-icon inline-items">
    									<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
    									<span>32</span>
    								</a>
    							</div>
    
    
    						</div>
    
    						<div class="control-block-button post-control-button">
    
    							<a href="#" class="btn btn-control">
    								<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
    							</a>
    
    							<a href="#" class="btn btn-control">
    								<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
    							</a>
    
    							<a href="#" class="btn btn-control">
    								<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
    							</a>
    
    						</div>
    
    					</article>
    
    					<div class="mCustomScrollbar" data-mcs-theme="dark">
    
    						<ul class="comments-list">
    							<li class="comment-item">
    								<div class="post__author author vcard inline-items">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar48-sm.jpg" alt="author">
    
    									<div class="author-date">
    										<a class="h6 post__author-name fn" href="#">Marina Valentine</a>
    										<div class="post__date">
    											<time class="published" datetime="2017-03-24T18:18">
    												46 mins ago
    											</time>
    										</div>
    									</div>
    
    									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
    
    								</div>
    
    								<p>I had a great time too!! We should do it again!</p>
    
    								<a href="#" class="post-add-icon inline-items">
    									<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
    									<span>8</span>
    								</a>
    								<a href="#" class="reply">Reply</a>
    							</li>
    
    							<li class="comment-item">
    								<div class="post__author author vcard inline-items">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar4-sm.jpg" alt="author">
    
    									<div class="author-date">
    										<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
    										<div class="post__date">
    											<time class="published" datetime="2017-03-24T18:18">
    												1 hour ago
    											</time>
    										</div>
    									</div>
    
    									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
    
    								</div>
    
    								<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
    
    								<a href="#" class="post-add-icon inline-items">
    									<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
    									<span>7</span>
    								</a>
    								<a href="#" class="reply">Reply</a>
    
    							</li>
    						</ul>
    
    					</div>
    
    					<form class="comment-form inline-items">
    
    						<div class="post__author author vcard inline-items">
    							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/author-page.jpg" alt="author">
    
    							<div class="form-group with-icon-right ">
    								<textarea class="form-control" placeholder="Press Enter to post..."></textarea>
    								<div class="add-options-message">
    									<a href="#" class="options-message">
    										<svg class="olymp-camera-icon"><use xlink:href="#olymp-camera-icon"></use></svg>
    									</a>
    								</div>
    							</div>
    						</div>
    
    					</form>
    
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
    
    
    <!-- ... end Window-popup Open Photo Popup V1 -->
    
    <!-- Window-popup Open Photo Popup V2 -->
    @foreach($wallalbums as $wallalbum)
        <div class="modal fade modal-has-swiper" id="album-{{ $wallalbum->id }}" tabindex="-1" role="dialog" aria-labelledby="album-{{ $wallalbum->id }}" aria-hidden="true">
    	<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v2" role="document">
    		<div class="modal-content">
    			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
    				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
    			</a>
    
    			<div class="modal-body">
    				<div class="open-photo-thumb">
    
    					<div class="swiper-container" data-effect="fade" data-autoplay="4000">
    						<!-- Additional required wrapper -->
    						<div class="swiper-wrapper">
    							<!-- Slides -->
                                @foreach($wallalbum->photos as $photo)
    							<div class="swiper-slide">
    								<div class="photo-item" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
    									<img loading="lazy" src="/uploads/wall/{{ $user->nickname }}/{{ $photo->name }}" alt="{{ $photo->name }}">
    									<div class="overlay"></div>
    									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
    									<a href="#" class="tag-friends" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
    										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
    									</a>
    
    									<div class="content">
    										<a href="#" class="h6 title">{{ $photo->desc }}</a>
    										<time class="published">{{ $photo->timeElapsedString() }}</time>
    									</div>
    								</div>
    							</div>
    							@endforeach

    						</div>
    					</div>
    
    					<!--Pagination tabs-->
    
    					<div class="slider-slides">
    					    @foreach($wallalbum->photos as $photo)
        						<a href="#" class="slides-item ">
        							<img loading="lazy" src="/uploads/wall/{{ $user->nickname }}/{{ $photo->name }}" alt="{{ $photo->name }}" style="max-width: 100px;">
        							<div class="overlay overlay-dark"></div>
        						</a>
    						@endforeach
    
    						<!--Prev Next Arrows-->
    
    						<svg class="btn-next olymp-popup-right-arrow"><use xlink:href="#olymp-popup-right-arrow"></use></svg>
    
    						<svg class="btn-prev olymp-popup-left-arrow"><use xlink:href="#olymp-popup-left-arrow"></use></svg>
    
    					</div>
    
    				</div>
    
    				<div class="open-photo-content">
    
            			<article class="hentry post">
            
            				<div class="post__author author vcard inline-items">
            					<img loading="lazy" src="https://html.crumina.net/html-olympus/img/author-page.jpg" alt="author">
            
            					<div class="author-date">
            						<a class="h6 post__author-name fn" href="/">James Spiegel</a>
            						<div class="post__date">
            							<time class="published" datetime="2017-03-24T18:18">
            								2 hours ago
            							</time>
            						</div>
            					</div>
            
            					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
            						<ul class="more-dropdown">
            							<li>
            								<a href="#">Edit Post</a>
            							</li>
            							<li>
            								<a href="#">Delete Post</a>
            							</li>
            							<li>
            								<a href="#">Turn Off Notifications</a>
            							</li>
            							<li>
            								<a href="#">Select as Featured</a>
            							</li>
            						</ul>
            					</div>
            
            				</div>
            
            				<p>Here’s a photo from last month’s photoshoot. We really had a great time and got a batch of incredible shots for the new catalog.</p>
            
            				<p>With: <a href="#">Jessy Owen</a>, <a href="#">Marina Valentine</a></p>
            
            				<div class="post-additional-info inline-items">
            
            					<a href="#" class="post-add-icon inline-items">
            						<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
            						<span>148</span>
            					</a>
            
            
            					<div class="comments-shared">
            						<a href="#" class="post-add-icon inline-items">
            							<svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>
            							<span>61</span>
            						</a>
            
            						<a href="#" class="post-add-icon inline-items">
            							<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
            							<span>32</span>
            						</a>
            					</div>
            
            
            				</div>
            
            				<div class="control-block-button post-control-button">
            
            					<a href="#" class="btn btn-control">
            						<svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
            					</a>
            
            					<a href="#" class="btn btn-control">
            						<svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
            					</a>
            
            					<a href="#" class="btn btn-control">
            						<svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
            					</a>
            
            				</div>
            
                       </article>
            
            			<div class="mCustomScrollbar" data-mcs-theme="dark">
            
            				<ul class="comments-list">
            					<li class="comment-item">
            						<div class="post__author author vcard inline-items">
            							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar48-sm.jpg" alt="author">
            
            							<div class="author-date">
            								<a class="h6 post__author-name fn" href="#">Marina Valentine</a>
            								<div class="post__date">
            									<time class="published" datetime="2017-03-24T18:18">
            										46 mins ago
            									</time>
            								</div>
            							</div>
            
            							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
            
            						</div>
            
            						<p>I had a great time too!! We should do it again!</p>
            
            						<a href="#" class="post-add-icon inline-items">
            							<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
            							<span>8</span>
            						</a>
            						<a href="#" class="reply">Reply</a>
            					</li>
            
            					<li class="comment-item">
            						<div class="post__author author vcard inline-items">
            							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar4-sm.jpg" alt="author">
            
            							<div class="author-date">
            								<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
            								<div class="post__date">
            									<time class="published" datetime="2017-03-24T18:18">
            										1 hour ago
            									</time>
            								</div>
            							</div>
            
            							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
            
            						</div>
            
            						<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
            
            						<a href="#" class="post-add-icon inline-items">
            							<svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
            							<span>7</span>
            						</a>
            						<a href="#" class="reply">Reply</a>
            
            					</li>
            				</ul>
            
            			</div>
            
            			<form class="comment-form inline-items">
            
            				<div class="post__author author vcard inline-items">
            					<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar73-sm.jpg" alt="author">
            					<div class="form-group with-icon-right ">
            						<textarea class="form-control" placeholder="Press Enter to post..." ></textarea>
            						<div class="add-options-message">
            							<a href="#" class="options-message">
            								<svg class="olymp-camera-icon"><use xlink:href="#olymp-camera-icon"></use></svg>
            							</a>
            						</div>
            					</div>
            				</div>
            
            			</form>
            
            		</div>
    			</div>
    		</div>
    	</div>
    </div>
    @endforeach
    <!-- Window-popup Open Photo Popup V2 -->
    <!-- Window-popup Create Photo Album -->
    
    <div class="modal fade" id="create-photo-album" tabindex="-1" role="dialog" aria-labelledby="create-photo-album" aria-hidden="true">
    	<div class="modal-dialog window-popup create-photo-album" role="document">
    		<div class="modal-content">
    			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
    				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
    			</a>
    
    			<div class="modal-header">
    				<h6 class="title">Создать фото-альбом</h6>
    			</div>
    
    			<form id="uploadPhotos" action="{{ route('users_add_album', $user->nickname) }}" enctype="multipart/form-data" method="post" class="modal-body">
                    @csrf
        			<div class="form-group label-floating">
        			    
        				<label class="control-label">Имя альбома</label>
        				<input class="form-control" name="album-name" placeholder="" type="text" value="">
        			
        			     <input type="file" name="files[]" multiple accept=".gif,.jpg,.jpeg,.png" />
        			</div>
        
        			<div class="photo-album-wrapper">
        				<a class="photo-album-item-wrap col-3-width photo-album-add-photos" href="#">
        					<div class="photo-album-item create-album">
        						<div class="content">
        							<div class="btn btn-control bg-primary">
        								<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
        							</div>
        
        							<div class="title h5">Добавить больше фотографий...</div>
        						</div>
        					</div>
        				</a>
        			</div>
        
        			<button class="btn btn-secondary btn-lg btn--half-width cancel-upload-album">Отменить</button>
        			<button class="btn btn-primary btn-lg btn--half-width">
        			    Опубликовать альбом<div class="ripple-container"></div>
        			 </button>
        
        		</form>
    		</div>
    	</div>
    </div>
    
    <!-- ... end Window-popup Create Photo Album -->
    <!-- Window-popup Update Header Photo -->
    
    <div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
    	<div class="modal-dialog window-popup update-header-photo" role="document">
    		<div class="modal-content">
    			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
    				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
    			</a>
    
    			<div class="modal-header">
    				<h6 class="title">Update Header Photo</h6>
    			</div>
    
    			<div class="modal-body">
    				<a href="#" class="upload-photo-item">
    				<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
    
    				<h6>Upload Photo</h6>
    				<span>Browse your computer.</span>
    			</a>
    
    				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
    
    			<svg class="olymp-photos-icon"><use xlink:href="#olymp-photos-icon"></use></svg>
    
    			<h6>Choose from My Photos</h6>
    			<span>Choose from your uploaded photos</span>
    		</a>
    			</div>
    		</div>
    	</div>
    </div>
    
    
    <!-- ... end Window-popup Update Header Photo -->
    
    <!-- Window-popup Choose from my Photo -->
    
    <div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
    	<div class="modal-dialog window-popup choose-from-my-photo" role="document">
    
    		<div class="modal-content">
    			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
    				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
    			</a>
    			<div class="modal-header">
    				<h6 class="title">Choose from My Photos</h6>
    
    				<!-- Nav tabs -->
    				<ul class="nav nav-tabs" role="tablist">
    					<li class="nav-item">
    						<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
    							<svg class="olymp-photos-icon"><use xlink:href="#olymp-photos-icon"></use></svg>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
    							<svg class="olymp-albums-icon"><use xlink:href="#olymp-albums-icon"></use></svg>
    						</a>
    					</li>
    				</ul>
    			</div>
    
    			<div class="modal-body">
    				<!-- Tab panes -->
    				<div class="tab-content">
    					<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
    
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo1.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo2.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo3.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo4.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo5.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo6.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo7.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo8.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    						<div class="choose-photo-item">
    							<div class="radio">
    								<label class="custom-radio">
    									<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo9.jpg" alt="photo">
    									<input type="radio" name="optionsRadios">
    								</label>
    							</div>
    						</div>
    
    
    						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
    						<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>
    
    					</div>
    					<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
    
    						<div class="choose-photo-item">
    							<figure>
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo10.jpg" alt="photo">
    								<figcaption>
    									<a href="#">South America Vacations</a>
    									<span>Last Added: 2 hours ago</span>
    								</figcaption>
    							</figure>
    						</div>
    						<div class="choose-photo-item">
    							<figure>
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo11.jpg" alt="photo">
    								<figcaption>
    									<a href="#">Photoshoot Summer 2016</a>
    									<span>Last Added: 5 weeks ago</span>
    								</figcaption>
    							</figure>
    						</div>
    						<div class="choose-photo-item">
    							<figure>
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo12.jpg" alt="photo">
    								<figcaption>
    									<a href="#">Amazing Street Food</a>
    									<span>Last Added: 6 mins ago</span>
    								</figcaption>
    							</figure>
    						</div>
    
    						<div class="choose-photo-item">
    							<figure>
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo13.jpg" alt="photo">
    								<figcaption>
    									<a href="#">Graffity & Street Art</a>
    									<span>Last Added: 16 hours ago</span>
    								</figcaption>
    							</figure>
    						</div>
    						<div class="choose-photo-item">
    							<figure>
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo14.jpg" alt="photo">
    								<figcaption>
    									<a href="#">Amazing Landscapes</a>
    									<span>Last Added: 13 mins ago</span>
    								</figcaption>
    							</figure>
    						</div>
    						<div class="choose-photo-item">
    							<figure>
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/choose-photo15.jpg" alt="photo">
    								<figcaption>
    									<a href="#">The Majestic Canyon</a>
    									<span>Last Added: 57 mins ago</span>
    								</figcaption>
    							</figure>
    						</div>
    
    
    						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
    						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
    					</div>
    				</div>
    			</div>
    		</div>
    
    	</div>
    </div>
    
    <!-- ... end Window-popup Choose from my Photo -->
    
    
    <a class="back-to-top" href="#">
    	<img src="https://html.crumina.net/html-olympus/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>
    
    
    
    
    <!-- Window-popup-CHAT for responsive min-width: 768px -->
    <?php /* 
    <div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">
    
    	<div class="modal-content">
    		<div class="modal-header">
    			<span class="icon-status online"></span>
    			<h6 class="title" >Chat</h6>
    			<div class="more">
    				<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
    				<svg class="olymp-little-delete js-chat-open"><use xlink:href="#olymp-little-delete"></use></svg>
    			</div>
    		</div>
    		<div class="modal-body">
    			<div class="mCustomScrollbar">
    				<ul class="notification-list chat-message chat-message-field">
    					<li>
    						<div class="author-thumb">
    							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
    						</div>
    						<div class="notification-event">
    							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
    							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
    						</div>
    					</li>
    
    					<li>
    						<div class="author-thumb">
    							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/author-page.jpg" alt="author" class="mCS_img_loaded">
    						</div>
    						<div class="notification-event">
    							<span class="chat-message-item">Don’t worry Mathilda!</span>
    							<span class="chat-message-item">I already bought everything</span>
    							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
    						</div>
    					</li>
    
    					<li>
    						<div class="author-thumb">
    							<img loading="lazy" src="https://html.crumina.net/html-olympus/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
    						</div>
    						<div class="notification-event">
    							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
    							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
    						</div>
    					</li>
    				</ul>
    			</div>
    
    			<form class="need-validation">
    
    		<div class="form-group">
    			<textarea class="form-control" placeholder="Press enter to post..."></textarea>
    			<div class="add-options-message">
    				<a href="#" class="options-message">
    					<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
    				</a>
    				<div class="options-message smile-block">
    
    					<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>
    
    					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat1.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat2.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat3.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat4.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat5.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat6.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat7.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat8.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat9.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat10.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat11.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat12.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat13.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat14.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat15.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat16.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat17.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat18.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat19.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat20.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat21.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat22.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat23.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat24.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat25.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat26.png" alt="icon">
    							</a>
    						</li>
    						<li>
    							<a href="#">
    								<img loading="lazy" src="https://html.crumina.net/html-olympus/img/icon-chat27.png" alt="icon">
    							</a>
    						</li>
    					</ul>
    				</div>
    			</div>
    		</div>
    
    	</form>
    		</div>
    	</div>
    
    </div>
    <?php */?>
@endsection


    