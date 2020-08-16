@extends('website.website')

@section('content')
    <div class="inner">
		<div class="container-fluid">
			<div class="row">
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="ui-block">
						<div class="top-header">
							<div class="top-header-thumb">
								<img src="/img/wall/img/top-header1.jpg" alt="nature">
							</div>
							<div class="profile-section">
								<div class="row">
									<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
										<ul class="profile-menu">
											<li>
												<a href="02-ProfilePage.html" class="active">Моя линия жизни</a>
											</li>
											<li>
												<a href="05-ProfilePage-About.html">Мой гороскоп</a>
											</li>
											<li>
												<a href="06-ProfilePage.html">Мои Эксперты</a>
											</li>
										</ul>
									</div>
									<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
										<ul class="profile-menu">
											<li>
												<a href="07-ProfilePage-Photos.html">Фото</a>
											</li>
											<li>
												<a href="09-ProfilePage-Videos.html">Видео</a>
											</li>
											<li>
												<div class="more">
													<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
													<ul class="more-dropdown more-with-triangle">
														<li>
															<a href="#">Сообщить о профиле</a>
														</li>
														<li>
															<a href="#">Заблокировать профиль</a>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</div>
		
								<div class="control-block-button">
									<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
									</a>
		
									<a href="#" class="btn btn-control bg-purple">
										<svg class="olymp-chat---messages-icon"><use xlink:href="#olymp-chat---messages-icon"></use></svg>
									</a>
		
									<div class="btn btn-control bg-primary more">
										<svg class="olymp-settings-icon"><use xlink:href="#olymp-settings-icon"></use></svg>
		
										<ul class="more-dropdown more-with-triangle triangle-bottom-right">
											<li>
												<a href="#" data-toggle="modal" data-target="#update-header-photo">Обновить Фото Профиля</a>
											</li>
											<li>
												<a href="#" data-toggle="modal" data-target="#update-header-photo">Обновить Обложку страницы</a>
											</li>
											<li>
												<a href="29-YourAccount-AccountSettings.html">Настройки аккаунта</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="top-header-author">
								<a href="/users/{{ $user->nickname }}" class="author-thumb">
									<img src="{{ $user->avatar() }}" alt="author">
								</a>
								<div class="author-content">
									<a href="/users/{{ $user->nickname }}" class="h4 author-name">Екатерина Мэйри</a>
									<!--<div class="country">Санкт-Петербург, РФ</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- ... end Top Header-Profile -->
		<div class="container-fluid">
			<div class="row">
		
				<!-- Main Content -->
		
				<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
					<div id="newsfeed-items-grid">
						<div class="ui-block">
							
							<div class="news-feed-form">
							
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
										<form action="/users/addpost" method="post">
											@csrf
											<div class="author-thumb">
												<img src="{{ $user->avatar() }}" alt="author">
											</div>
											<div class="form-group with-icon label-floating is-empty">
												<textarea class="form-control" placeholder="Написать, сообщение..."></textarea>
											<span class="material-input"></span></div>
											<div class="add-options-message">
												<input accept="image/*,image/heif,image/heic,video/*,video/mp4,video/x-m4v,video/x-matroska" multiple="" type="file" />
												<a href="#" class="options-message wall-post-add-photo" data-tooltip="Добавить фото" data-placement="top">
													<svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="#olymp-camera-icon"></use></svg>
												</a>
							
												<!--<a href="#" class="options-message" data-tooltip="tooltip" data-placement="top" data-original-title="ADD LOCATION">-->
												<!--	<svg class="olymp-small-pin-icon"><use xlink:href="#olymp-small-pin-icon"></use></svg>-->
												<!--</a>-->
							
												<button class="btn btn-primary btn-md-2">Отправить сообщение</button>
							
											</div>
							
										</form>
									</div>
							
								</div>
							</div>
							
						</div>
						<div class="ui-block">
							<!-- Post -->
							
							<article class="hentry post">
							
									<div class="post__author author vcard inline-items">
										<img src="/img/wall/img/author-page.jpg" alt="author">
							
										<div class="author-date">
											<a class="h6 post__author-name fn" href="02-ProfilePage.html">Екатерина Мейри</a>
											<div class="post__date">
												<time class="published" datetime="2020-03-24T18:18">
													19 часов спустя
												</time>
											</div>
										</div>
							
										<div class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
											<ul class="more-dropdown">
												<li>
													<a href="#">Редактировать профиль</a>
												</li>
												<li>
													<a href="#">Удалить сообщение</a>
												</li>
												<li>
													<a href="#">Выключить все уведомления</a>
												</li>
												<li>
													<a href="#">Сохранить в закладки</a>
												</li>
											</ul>
										</div>
							
									</div>
							
									<p> Желание быть болью в руках купидона было подвергнуто критике в удовольствие от Duis et dolore magna не избежать!
										производители. Excepteur не исключены cupidatat, чернокожие виноваты в том, что эти службы потерпели неудачу
										успокаивает душу, то есть от ваших неприятностей. Но я должен объяснить вам, как все это ошибочное представление о удовольствии
										прокуратура и боль.
									</p>
							
									<div class="post-additional-info inline-items">
							
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-heart-icon">
												<use xlink:href="#olymp-heart-icon"></use>
											</svg>
											<span>8</span>
										</a>
							
										<ul class="friends-harmonic">
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic7.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic8.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic9.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic10.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic11.jpg" alt="friend">
												</a>
											</li>
										</ul>
							
										<div class="names-people-likes">
											<a href="#">Ирина</a>, <a href="#">Роберт</a> также
											<br>6 и более, понравилось это
										</div>
							
							
										<div class="comments-shared">
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-speech-balloon-icon">
													<use xlink:href="#olymp-speech-balloon-icon"></use>
												</svg>
												<span>17</span>
											</a>
							
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-share-icon">
													<use xlink:href="#olymp-share-icon"></use>
												</svg>
												<span>24</span>
											</a>
										</div>
							
							
									</div>
							
									<div class="control-block-button post-control-button">
							
										<a href="#" class="btn btn-control featured-post">
											<svg class="olymp-trophy-icon">
												<use xlink:href="#olymp-trophy-icon"></use>
											</svg>
										<div class="ripple-container"></div></a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-like-post-icon">
												<use xlink:href="#olymp-like-post-icon"></use>
											</svg>
										</a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-comments-post-icon">
												<use xlink:href="#olymp-comments-post-icon"></use>
											</svg>
										</a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-share-icon">
												<use xlink:href="#olymp-share-icon"></use>
											</svg>
										</a>
							
									</div>
							
								</article>
							
						</div>
						<div class="ui-block">
							
							<!-- Post -->
							
							<article class="hentry post video">
							
									<div class="post__author author vcard inline-items">
										<img src="/img/wall/img/author-page.jpg" alt="author">
							
										<div class="author-date">
											<a class="h6 post__author-name fn" href="02-ProfilePage.html">Екатерина Мэйри</a> поделиться
											<a href="#">ссылка</a>
											<div class="post__date">
												<time class="published" datetime="2020-03-24T18:18">
													7 часов спустя
												</time>
											</div>
										</div>
							
										<div class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
											<ul class="more-dropdown">
												<li>
													<a href="#">Редактировать новость</a>
												</li>
												<li>
													<a href="#">Удалить новость</a>
												</li>
												<li>
													<a href="#">Выключить уведомления</a>
												</li>
												<li>
													<a href="#">Сохранить в мои закладки</a>
												</li>
											</ul>
										</div>
							
									</div>
							
									<p>Если кто-то пропустил это, проверьте новую песню System of a Revenge! Я думаю, что они возвращаются к своим корням ...</p>
							
									<div class="post-video">
										<div class="video-thumb">
											<img src="/img/wall/img/video5.jpg" alt="photo">
											<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
												<svg class="olymp-play-icon">
													<use xlink:href="#olymp-play-icon"></use>
												</svg>
											</a>
										</div>
							
										<div class="video-content">
											<a href="#" class="h4 title">System of a Revenge - Nothing Else Matters (LIVE)</a>
											<p></p>
											<a href="#" class="link-site">YOUTUBE.COM</a>
										</div>
									</div>
							
									<div class="post-additional-info inline-items">
							
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-heart-icon">
												<use xlink:href="#olymp-heart-icon"></use>
											</svg>
											<span>15</span>
										</a>
							
										<ul class="friends-harmonic">
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic9.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic10.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic7.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic8.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic11.jpg" alt="friend">
												</a>
											</li>
										</ul>
							
										<div class="names-people-likes">
											<a href="#">Ирина</a>, <a href="#">Роберт</a> также
											<br>13 более, понравилось это
										</div>
							
										<div class="comments-shared">
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-speech-balloon-icon">
													<use xlink:href="#olymp-speech-balloon-icon"></use>
												</svg>
												<span>1</span>
											</a>
							
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-share-icon">
													<use xlink:href="#olymp-share-icon"></use>
												</svg>
												<span>16</span>
											</a>
										</div>
							
							
									</div>
							
									<div class="control-block-button post-control-button">
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-like-post-icon">
												<use xlink:href="#olymp-like-post-icon"></use>
											</svg>
										</a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-comments-post-icon">
												<use xlink:href="#olymp-comments-post-icon"></use>
											</svg>
										</a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-share-icon">
												<use xlink:href="#olymp-share-icon"></use>
											</svg>
										</a>
							
									</div>
							
								</article>
							
							<!-- .. end Post -->				</div>
						<div class="ui-block">
							<!-- Post -->
							
							<article class="hentry post">
							
								<div class="post__author author vcard inline-items">
									<img src="/img/wall/img/author-page.jpg" alt="author">
							
									<div class="author-date">
										<a class="h6 post__author-name fn" href="02-ProfilePage.html">Екатерина Мэйрин</a>
										<div class="post__date">
											<time class="published" datetime="2020-03-24T18:18">
												2 часа спустя
											</time>
										</div>
									</div>
							
									<div class="more">
										<svg class="olymp-three-dots-icon">
											<use xlink:href="#olymp-three-dots-icon"></use>
										</svg>
										<ul class="more-dropdown">
												<li>
													<a href="#">Редактировать новость</a>
												</li>
												<li>
													<a href="#">Удалить новость</a>
												</li>
												<li>
													<a href="#">Выключить уведомления</a>
												</li>
												<li>
													<a href="#">Сохранить в мои закладки</a>
												</li>
										</ul>
									</div>
							
								</div>
							
								<p>вы должны работать, а также темп и жизненную силу, ожирение. На протяжении многих лет приходят, кто ноструй упражнений, в школьном округе рабочей среды.
								</p>
							
								<div class="post-additional-info inline-items">
							
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="#olymp-heart-icon"></use>
										</svg>
										<span>36</span>
									</a>
							
									<ul class="friends-harmonic">
										<li>
											<a href="#">
												<img src="/img/wall/img/friend-harmonic7.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="/img/wall/img/friend-harmonic8.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="/img/wall/img/friend-harmonic9.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="/img/wall/img/friend-harmonic10.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="/img/wall/img/friend-harmonic11.jpg" alt="friend">
											</a>
										</li>
									</ul>
							
									<div class="names-people-likes">
										<a href="#">Вы</a>, <a href="#">Елена Астролог</a> также..
										<br>34 более, понравилось это
									</div>
							
							
									<div class="comments-shared">
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-speech-balloon-icon">
												<use xlink:href="#olymp-speech-balloon-icon"></use>
											</svg>
											<span>17</span>
										</a>
							
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-share-icon">
												<use xlink:href="#olymp-share-icon"></use>
											</svg>
											<span>24</span>
										</a>
									</div>
							
							
								</div>
							
								<div class="control-block-button post-control-button">
							
									<a href="#" class="btn btn-control">
										<svg class="olymp-like-post-icon">
											<use xlink:href="#olymp-like-post-icon"></use>
										</svg>
									</a>
							
									<a href="#" class="btn btn-control">
										<svg class="olymp-comments-post-icon">
											<use xlink:href="#olymp-comments-post-icon"></use>
										</svg>
									</a>
							
									<a href="#" class="btn btn-control">
										<svg class="olymp-share-icon">
											<use xlink:href="#olymp-share-icon"></use>
										</svg>
									</a>
							
								</div>
							
							</article>
							
							<!-- .. end Post -->					
							<!-- Comments -->
							
							<ul class="comments-list">
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="/img/wall/img/avatar10-sm.jpg" alt="author">
							
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Валентина Дифузи</a>
											<div class="post__date">
												<time class="published" datetime="2020-03-24T18:18">
													5 мин. спустя
												</time>
											</div>
										</div>
							
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
										</a>
							
									</div>
							
									<p>Тем не менее, чтобы объяснить вам, как все это ошибочное представление об осуждении удовольствия и восхвалении боли дер.</p>
							
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="#olymp-heart-icon"></use>
										</svg>
										<span>8</span>
									</a>
									<a href="#" class="reply">Ответить</a>
								</li>
								<li class="comment-item has-children">
									<div class="post__author author vcard inline-items">
										<img src="/img/wall/img/avatar5-sm.jpg" alt="author">
							
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Красный Бог камней</a>
											<div class="post__date">
												<time class="published" datetime="2020-03-24T18:18">
													1 час спустя
												</time>
											</div>
										</div>
							
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
										</a>
							
									</div>
							
									<p>Нет удовольствия, потому что это боль, ненависть или бегство, а потому, что
										Страдания тех, кто не знает, как стремиться к удовольствию, рационально сталкиваются с последствиями, которые дополняют жизнь. не дальше
										любой человек, принадлежащий только к их мучительным страданиям, что он должен сидеть, добавить к нему восхищение, которое он желает достичь, дер, которого он желает достичь,.
									</p>
							
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="#olymp-heart-icon"></use>
										</svg>
										<span>5</span>
									</a>
									<a href="#" class="reply">Ответить</a>
							
									<ul class="children">
										<li class="comment-item">
											<div class="post__author author vcard inline-items">
												<img src="/img/wall/img/avatar8-sm.jpg" alt="author">
							
												<div class="author-date">
													<a class="h6 post__author-name fn" href="#">Диана Верес</a>
													<div class="post__date">
														<time class="published" datetime="2020-03-24T18:18">
															39 мин. спустя
														</time>
													</div>
												</div>
							
												<a href="#" class="more">
													<svg class="olymp-three-dots-icon">
														<use xlink:href="#olymp-three-dots-icon"></use>
													</svg>
												</a>
							
											</div>
							
											<p>Хочешь, чтобы боль в купидоне болталась, критика в Duis et dolore magna rune не доставляет результирующего удовольствия?.</p>
							
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-heart-icon">
													<use xlink:href="#olymp-heart-icon"></use>
												</svg>
												<span>2</span>
											</a>
											<a href="#" class="reply">Ответить</a>
										</li>
										<li class="comment-item">
											<div class="post__author author vcard inline-items">
												<img src="/img/wall/img/avatar2-sm.jpg" alt="author">
							
												<div class="author-date">
													<a class="h6 post__author-name fn" href="#">Никола Грисмон</a>
													<div class="post__date">
														<time class="published" datetime="2020-03-24T18:18">
															24 мин. спустя
														</time>
													</div>
												</div>
							
												<a href="#" class="more">
													<svg class="olymp-three-dots-icon">
														<use xlink:href="#olymp-three-dots-icon"></use>
													</svg>
												</a>
							
											</div>
							
											<p>Даже для них, негры не являются исключительными.</p>
							
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-heart-icon">
													<use xlink:href="#olymp-heart-icon"></use>
												</svg>
												<span>0</span>
											</a>
											<a href="#" class="reply">Ответить</a>
							
										</li>
									</ul>
							
								</li>
							
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="/img/wall/img/avatar4-sm.jpg" alt="author">
							
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">Евгений Титовский</a>
											<div class="post__date">
												<time class="published" datetime="2020-03-24T18:18">
													1 час спустя
												</time>
											</div>
										</div>
							
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
										</a>
							
									</div>
							
									<p>Безболезненный полет футбольных производителей. Excepteur cupidatat не виноваты чернокожие, что успокаивает отказаться от своих обязанностей.</p>
							
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="#olymp-heart-icon"></use>
										</svg>
										<span>7</span>
									</a>
									<a href="#" class="reply">Ответить</a>
							
								</li>
							</ul>
							
							<!-- ... end Comments -->
							<a href="#" class="more-comments">Просмотреть больше коментариев <span>+</span></a>
							
							<!-- Comment Form  -->
							
							<form class="comment-form inline-items">
							
								<div class="post__author author vcard inline-items">
									<img src="/img/wall/img/author-page.jpg" alt="author">
							
									<div class="form-group with-icon-right is-empty">
										<textarea class="form-control" placeholder=""></textarea>
										<div class="add-options-message">
											<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
												<svg class="olymp-camera-icon">
													<use xlink:href="#olymp-camera-icon"></use>
												</svg>
											</a>
										</div>
									<span class="material-input"></span></div>
								</div>
							
								<button class="btn btn-md-2 btn-primary">Коментировать новость</button>
							
								<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>
							
							</form>
							
							<!-- ... end Comment Form  -->				</div>
						<div class="ui-block">
							<!-- Post -->
							
							<article class="hentry post has-post-thumbnail shared-photo">
							
									<div class="post__author author vcard inline-items">
										<img src="/img/wall/img/author-page.jpg" alt="author">
							
										<div class="author-date">
											<a class="h6 post__author-name fn" href="02-ProfilePage.html">Екатерина Мэйрин</a> поделиться..
											<a href="#">Диана Верес</a><a href="#"> публикация </a>
											<div class="post__date">
												<time class="published" datetime="2020-03-24T18:18">
													7 часов спустя
												</time>
											</div>
										</div>
							
										<div class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="#olymp-three-dots-icon"></use>
											</svg>
											<ul class="more-dropdown">
												<li>
													<a href="#">Редактировать новость</a>
												</li>
												<li>
													<a href="#">Удалить новость</a>
												</li>
												<li>
													<a href="#">Выключить уведомления</a>
												</li>
												<li>
													<a href="#">Сохранить в мои закладки</a>
												</li>
											</ul>
										</div>
							
									</div>
							
									<p>Здравствуй! Каждый должен проверить эти удивительные фотографии, которые мой друг снял на прошлой неделе. Вот один из них ... оставьте добрый комментарий!</p>
							
									<div class="post-thumb">
										<img src="/img/wall/img/post-photo6.jpg" alt="photo">
									</div>
							
									<ul class="children single-children">
										<li class="comment-item">
											<div class="post__author author vcard inline-items">
												<img src="/img/wall/img/avatar8-sm.jpg" alt="author">
												<div class="author-date">
													<a class="h6 post__author-name fn" href="#">Диана Верес</a>
													<div class="post__date">
														<time class="published" datetime="2020-03-24T18:18">
															16 часов спустя
														</time>
													</div>
												</div>
											</div>
							
											<p>Вот первая фотография нашей невероятной фотосессии со вчерашнего дня. Если вам это нравится, скажите, пожалуйста, и скажите мне, что вы хотите увидеть дальше!</p>
										</li>
									</ul>
							
									<div class="post-additional-info inline-items">
							
										<a href="#" class="post-add-icon inline-items">
											<svg class="olymp-heart-icon">
												<use xlink:href="#olymp-heart-icon"></use>
											</svg>
											<span>15</span>
										</a>
							
										<ul class="friends-harmonic">
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic5.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic10.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic7.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic8.jpg" alt="friend">
												</a>
											</li>
											<li>
												<a href="#">
													<img src="/img/wall/img/friend-harmonic2.jpg" alt="friend">
												</a>
											</li>
										</ul>
							
										<div class="names-people-likes">
											<a href="#">Диана</a>, <a href="#">Евгеневна</a>также
											<br>13 и более 
										</div>
							
										<div class="comments-shared">
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-speech-balloon-icon">
													<use xlink:href="#olymp-speech-balloon-icon"></use>
												</svg>
												<span>0</span>
											</a>
							
											<a href="#" class="post-add-icon inline-items">
												<svg class="olymp-share-icon">
													<use xlink:href="#olymp-share-icon"></use>
												</svg>
												<span>16</span>
											</a>
										</div>
							
									</div>
							
									<div class="control-block-button post-control-button">
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-like-post-icon">
												<use xlink:href="#olymp-like-post-icon"></use>
											</svg>
										</a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-comments-post-icon">
												<use xlink:href="#olymp-comments-post-icon"></use>
											</svg>
										</a>
							
										<a href="#" class="btn btn-control">
											<svg class="olymp-share-icon">
												<use xlink:href="#olymp-share-icon"></use>
											</svg>
										</a>
							
									</div>
							
								</article>
							
							<!-- .. end Post -->				</div>
					</div>
		
					<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
						<svg class="olymp-three-dots-icon">
							<use xlink:href="#olymp-three-dots-icon"></use>
						</svg>
					</a>
				</div>
		
				<!-- ... end Main Content -->
		
		
				<!-- Left Sidebar -->
		
				<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
		
					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Профиль введение</h6>
						</div>
						<div class="ui-block-content">
		
							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<li>
									<span class="title">Личная информация<br></span>
									<span class="text">Привет, я Екатерина Мейри, мне 36 лет, и я работаю цифровым дизайнером в агентстве «Мечты» на пирсе 56.</span>
								</li>
								<li>
									<span class="title">Любимые TV передачи и шоу<br></span>
									<span class="text">Breaking Goods, Чертенок, Интересные люди, Бегущий мертвец, Найденный, Американский парень.</span>
								</li>
								<li>
									<span class="title">Музыкальные Группы/Артист<br></span>
									<span class="text">Iron Maid, DC / AC, Megablow, The Ill, Kung Fighters, Система Мести.</span>
								</li>
							</ul>
							
							<!-- .. end W-Personal-Info -->
							<!-- W-Socials -->
							
							<div class="widget w-socials">
								<h6 class="title">Другие социальные сети:</h6>
								<a href="#" class="social-item bg-facebook">
									<svg class="svg-inline--fa fa-facebook-f fa-w-10" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->
									Facebook
								</a>
								<a href="#" class="social-item bg-twitter">
									<svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter" aria-hidden="true"></i> -->
									Twitter
								</a>
								<a href="#" class="social-item bg-dribbble">
									<svg class="svg-inline--fa fa-dribbble fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="dribbble" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.252 8 8 119.252 8 256s111.252 248 248 248 248-111.252 248-248S392.748 8 256 8zm163.97 114.366c29.503 36.046 47.369 81.957 47.835 131.955-6.984-1.477-77.018-15.682-147.502-6.818-5.752-14.041-11.181-26.393-18.617-41.614 78.321-31.977 113.818-77.482 118.284-83.523zM396.421 97.87c-3.81 5.427-35.697 48.286-111.021 76.519-34.712-63.776-73.185-116.168-79.04-124.008 67.176-16.193 137.966 1.27 190.061 47.489zm-230.48-33.25c5.585 7.659 43.438 60.116 78.537 122.509-99.087 26.313-186.36 25.934-195.834 25.809C62.38 147.205 106.678 92.573 165.941 64.62zM44.17 256.323c0-2.166.043-4.322.108-6.473 9.268.19 111.92 1.513 217.706-30.146 6.064 11.868 11.857 23.915 17.174 35.949-76.599 21.575-146.194 83.527-180.531 142.306C64.794 360.405 44.17 310.73 44.17 256.323zm81.807 167.113c22.127-45.233 82.178-103.622 167.579-132.756 29.74 77.283 42.039 142.053 45.189 160.638-68.112 29.013-150.015 21.053-212.768-27.882zm248.38 8.489c-2.171-12.886-13.446-74.897-41.152-151.033 66.38-10.626 124.7 6.768 131.947 9.055-9.442 58.941-43.273 109.844-90.795 141.978z"></path></svg><!-- <i class="fab fa-dribbble" aria-hidden="true"></i> -->
									Instagram
								</a>
							</div>
							
							
							<!-- ... end W-Socials -->
						</div>
					</div>
		
					
		
					
		
					
		
					
		
				</div>
		
				<!-- ... end Left Sidebar -->
		
		
				<!-- Right Sidebar -->
		
				<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
		
					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Ваши фотографии</h6>
						</div>
						<div class="ui-block-content">
		
							<!-- W-Latest-Photo -->
							
							<ul class="widget w-last-photo js-zoom-gallery">
								<li>
									<a href="img/last-photo10-large.jpg">
										<img src="/img/wall/img/last-photo10-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot11-large.jpg">
										<img src="/img/wall/img/last-phot11-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot12-large.jpg">
										<img src="/img/wall/img/last-phot12-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot13-large.jpg">
										<img src="/img/wall/img/last-phot13-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot14-large.jpg">
										<img src="/img/wall/img/last-phot14-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot15-large.jpg">
										<img src="/img/wall/img/last-phot15-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot16-large.jpg">
										<img src="/img/wall/img/last-phot16-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot17-large.jpg">
										<img src="/img/wall/img/last-phot17-large.jpg" alt="photo">
									</a>
								</li>
								<li>
									<a href="img/last-phot18-large.jpg">
										<img src="/img/wall/img/last-phot18-large.jpg" alt="photo">
									</a>
								</li>
							</ul>
							
							
							<!-- .. end W-Latest-Photo -->
						</div>
					</div>
		
					
		
					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Друзей всего (86)</h6>
						</div>
						<div class="ui-block-content">
		
							<!-- W-Faved-Page -->
							
							<ul class="widget w-faved-page js-zoom-gallery">
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar38-sm.jpg" alt="author">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar24-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar36-sm.jpg" alt="author">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar35-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar34-sm.jpg" alt="author">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar33-sm.jpg" alt="author">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar32-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar31-sm.jpg" alt="author">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar30-sm.jpg" alt="author">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar29-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar28-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar27-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar26-sm.jpg" alt="user">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/img/wall/img/avatar25-sm.jpg" alt="user">
									</a>
								</li>
								<li class="all-users">
									<a href="#">+74</a>
								</li>
							</ul>
							
							<!-- .. end W-Faved-Page -->
						</div>
					</div>
				</div>
		
				<!-- ... end Right Sidebar -->
		
			</div>
		</div>
		
		<div>
		
		  	<svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg">
		   <defs>
		   <symbol id="olymp-stats-arrow" viewBox="0 0 32 32">
		      <title>stats-arrow</title>
		      <path d="M14.222 3.609h3.556v-3.534h-3.556v3.534zM14.222 31.927h3.556v-24.74h-3.556v24.74zM21.918 2.363l-2.514 2.382 10.055 9.527 2.514-2.382-10.055-9.527zM0.027 11.89l2.516 2.382 10.055-9.527-2.514-2.382-10.057 9.527z"></path>
		   </symbol>
		   <symbol id="olymp-little-delete" viewBox="0 0 32 32">
		      <title>little-delete</title>
		      <path d="M32 4.149l-3.973-3.979-11.936 11.941-11.941-11.941-3.979 3.979 11.941 11.936-11.941 11.936 3.979 3.979 11.941-11.936 11.936 11.936 3.973-3.979-11.936-11.936z"></path>
		   </symbol>
		   <symbol id="olymp-trophy-icon" viewBox="0 0 36 32">
		      <title>trophy-icon</title>
		      <path d="M24 4v10.4c0 3.088-2.692 5.6-6 5.6s-6-2.512-6-5.6v-10.4h12zM28 0h-20v14.4c0 5.302 4.476 9.6 10 9.6s10-4.298 10-9.6v-14.4z"></path>
		      <path d="M16 22h4v10h-4v-10z"></path>
		      <path d="M12 28h12v4h-12v-4z"></path>
		      <path d="M12.014 18h-2c-7.506 0-9.782-7.8-9.936-11.924l-0.078-2.076h12.014v14zM4.356 8c0.402 1.914 1.364 4.598 3.658 5.602v-5.602h-3.658z"></path>
		      <path d="M23.986 4h12.014l-0.078 2.076c-0.154 4.124-2.43 11.924-9.936 11.924h-2v-14zM27.986 8v5.602c2.294-1.004 3.256-3.688 3.658-5.602h-3.658z"></path>
		   </symbol>
		   <symbol id="olymp-block-from-chat" viewBox="0 0 35 32">
		      <title>block-from-chat</title>
		      <path d="M32 0h-28.8c-1.768 0-3.2 1.434-3.2 3.2v16c0 1.766 1.434 3.2 3.2 3.2 0 0 0.6 0 1.6 0v-3.2h-1.6v-16h28.8v19.2c1.766 0 3.2-1.434 3.2-3.2v-16c0-1.766-1.434-3.2-3.2-3.2zM20.8 22.4h1.6v-3.2h-1.6v3.2zM25.6 22.4h3.2v-3.2h-3.2v3.2z"></path>
		      <path d="M17.6 19.2l-9.6 6.626v-6.626h-3.2v12.8l12.8-9.6h3.2v-3.2z"></path>
		      <path d="M22.125 8.938l-2.262-2.262-2.262 2.262-2.262-2.262-2.264 2.262 2.262 2.262-2.262 2.264 2.264 2.262 2.262-2.262 2.262 2.262 2.262-2.262-2.262-2.264z"></path>
		   </symbol>
		   <symbol id="olymp-weather-refresh-icon" viewBox="0 0 30 32">
		      <title>weather-refresh-icon</title>
		      <path d="M14.769 32c-8.155 0-14.769-6.614-14.769-14.769 0-4.177 1.762-7.909 4.561-10.582l-3.414-3.412 12.18-1.794-1.794 12.18-3.348-3.35c-0.475 0.468-0.99 0.906-1.371 1.465v0c-1.115 1.585-1.89 3.407-1.89 5.494 0 5.438 4.409 9.846 9.846 9.846s9.846-4.409 9.846-9.846c0-2.4-0.891-4.566-2.316-6.274l3.764-3.136c2.139 2.56 3.476 5.814 3.476 9.41 0 8.155-6.614 14.769-14.769 14.769z"></path>
		   </symbol>
		   <symbol id="olymp-popup-left-arrow" viewBox="0 0 18 32">
		      <title>popup-left-arrow</title>
		      <path d="M0 14.222v3.556h3.556v-3.556h-3.556zM6.805 18.514l-2.514 2.514 10.057 10.055 2.514-2.514-10.057-10.055zM14.348 0.914l-10.057 10.057 2.514 2.514 10.057-10.055-2.514-2.516z"></path>
		   </symbol>
		   <symbol id="olymp-popup-right-arrow" viewBox="0 0 18 32">
		      <title>popup-right-arrow</title>
		      <path d="M14.222 14.222v3.556h3.556v-3.556h-3.556zM0.916 28.569l2.514 2.514 10.057-10.055-2.514-2.514-10.057 10.055zM0.916 3.429l10.057 10.055 2.514-2.514-10.057-10.057-2.514 2.516z"></path>
		   </symbol>
		   <symbol id="olymp-register-icon" viewBox="0 0 37 32">
		      <title>register-icon</title>
		      <path d="M16 3.213c3.24 0 6.192 1.214 8.446 3.2h4.346c-2.917-3.888-7.549-6.413-12.781-6.413-7.165 0-13.227 4.714-15.259 11.213h3.387c1.899-4.69 6.491-8 11.861-8zM16 28.813c-5.37 0-9.962-3.31-11.861-8h-3.378c2.040 6.485 8.094 11.187 15.25 11.187 5.222 0 9.842-2.515 12.762-6.387h-4.325c-2.256 1.986-5.208 3.2-8.448 3.2zM32 14.413v-4.8h-3.2v4.8h-4.8v3.2h4.8v4.8h3.2v-4.8h4.8v-3.2h-4.8zM3.2 14.413h-3.2v3.2h3.2v-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-login-icon" viewBox="0 0 29 32">
		      <title>login-icon</title>
		      <path d="M0 17.443c0 6.515 4.287 12.026 10.195 13.875v-3.081c-4.263-1.728-7.273-5.901-7.273-10.783 0-4.883 3.009-9.056 7.273-10.784v-3.1c-5.908 1.849-10.195 7.36-10.195 13.872zM18.922 3.578v3.092c4.263 1.728 7.273 5.901 7.273 10.783s-3.009 9.056-7.273 10.783v3.071c5.894-1.855 10.169-7.357 10.169-13.863 0-6.503-4.273-12.007-10.169-13.865zM13.104 14.545h2.909v-14.545h-2.909v14.545zM13.104 32h2.909v-2.909h-2.909v2.909z"></path>
		   </symbol>
		   <symbol id="olymp-three-dots-icon" viewBox="0 0 128 32">
		      <title>three-dots-icon</title>
		      <path d="M112-0.008c-8.84 0-16 7.16-16 16 0 8.832 7.16 15.992 16 15.992s16-7.16 16-15.992c0-8.84-7.16-16-16-16zM64-0.008c-8.84 0-16 7.16-16 16 0 8.832 7.16 15.992 16 15.992s16-7.16 16-15.992c0-8.84-7.16-16-16-16zM16-0.008c-8.832 0-16 7.16-16 16s7.168 15.992 16 15.992 16-7.16 16-15.992c0-8.84-7.16-16-16-16z"></path>
		   </symbol>
		   <symbol id="olymp-small-pin-icon" viewBox="0 0 25 32">
		      <title>small-pin-icon</title>
		      <path d="M12.444 7.111c-2.946 0-5.333 2.389-5.333 5.333 0 2.946 2.388 5.333 5.333 5.333s5.333-2.386 5.333-5.333c0-2.944-2.388-5.333-5.333-5.333zM12.444 14.222c-0.981 0-1.778-0.796-1.778-1.778s0.796-1.778 1.778-1.778 1.778 0.796 1.778 1.778-0.796 1.778-1.778 1.778z"></path>
		      <path d="M12.444 0c-4.823 0-8.996 2.891-11.061 7.111h4.194c1.632-2.151 4.087-3.556 6.868-3.556 4.901 0 8.889 4.277 8.889 9.534 0 7.237-6.46 13.865-8.876 15.204-1.838-1.054-6.148-5.36-8.011-10.516h-3.73c2.263 7.817 9.374 14.222 11.728 14.222 2.811 0 12.444-8.951 12.444-18.91 0-7.228-5.573-13.090-12.444-13.090z"></path>
		      <path d="M0 10.667h3.556v3.556h-3.556v-3.556z"></path>
		   </symbol>
		   <symbol id="olymp-small-calendar-icon" viewBox="0 0 25 32">
		      <title>small-calendar-icon</title>
		      <path d="M21.333 3.556h-1.778v-1.778c0-0.983-0.796-1.778-1.778-1.778-0.983 0-1.778 0.795-1.778 1.778v1.778h-7.111v-1.778c0-0.983-0.796-1.778-1.778-1.778-0.983 0-1.778 0.795-1.778 1.778v1.778h-1.778c-1.963 0-3.556 1.415-3.556 3.159v22.123c0 1.748 1.593 3.163 3.556 3.163h14.222v-3.556h-14.222v-21.333h1.778v1.778c0 0.981 0.795 1.778 1.778 1.778 0.981 0 1.778-0.796 1.778-1.778v-1.778h7.111v1.778c0 0.981 0.795 1.778 1.778 1.778 0.981 0 1.778-0.796 1.778-1.778v-1.778h1.778v17.778h3.556v-18.174c0-1.744-1.593-3.159-3.556-3.159zM21.333 32h3.556v-3.556h-3.556v3.556zM7.111 17.776h10.667v-3.556h-10.667v3.556zM7.111 24.887h3.556v-3.556h-3.556v3.556zM14.222 24.887h3.556v-3.556h-3.556v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-share-post-icon" viewBox="0 0 37 32">
		      <title>share-post-icon</title>
		      <path d="M11.691 16.788v3.046h6.085v3.048h-6.085v3.072l-6.095-4.584 6.095-4.582zM14.738 10.683l-14.216 10.686 14.216 10.688v-6.129h6.085v-9.144h-6.085v-6.101z"></path>
		      <path d="M16.262 6.095h3.048v3.048h-3.048v-3.048z"></path>
		      <path d="M33.33 8.25l-10.973-8.25v9.149h3.048v-3.046l6.095 4.582-6.095 4.582v-3.072h-9.134v3.048h6.086v6.129l14.214-10.686z"></path>
		   </symbol>
		   <symbol id="olymp-like-post-icon" viewBox="0 0 37 32">
		      <title>like-post-icon</title>
		      <path d="M33.449 2.994c-2.066-2.009-4.377-3.006-7.191-3.006-2.69 0-5.691 2.089-7.934 4.306-2.311-2.217-5.221-4.295-8.002-4.295-2.722 0-5.122 0.793-7.12 2.736-4.165 4.043-4.165 10.601 0 14.649 1.189 1.154 12.729 13.655 12.729 13.655 0.656 0.64 1.52 0.96 2.379 0.96 0.862 0 1.721-0.32 2.382-0.96l1.726-1.815-3.237-3.234-0.857 0.905c-3.122-3.381-10.862-11.744-11.936-12.789-1.122-1.090-1.739-2.528-1.737-4.050 0-1.52 0.617-2.955 1.739-4.046 1.024-0.997 2.238-1.44 3.931-1.44 0.777 0 2.512 0.791 4.839 3.022l3.214 3.081 3.163-3.131c2.215-2.19 4.037-2.985 4.718-2.985 1.573 0 2.77 0.512 4.007 1.714 1.12 1.088 1.737 2.523 1.737 4.046s-0.617 2.958-1.669 3.982c-0.13 0.121-0.135 0.123-2.037 2.123l-0.187 0.199 3.23 3.237 0.046-0.048 0.242-0.258c0 0 1.79-1.881 1.824-1.911 4.162-4.043 4.162-10.603 0-14.647z"></path>
		      <path d="M22.889 20.578h4.571v4.571h-4.571v-4.571z"></path>
		   </symbol>
		   <symbol id="olymp-dropdown-arrow-icon" viewBox="0 0 48 32">
		      <title>dropdown-arrow-icon</title>
		      <path d="M41.888 0.104l-17.952 19.064-17.952-19.064-5.984 6.352 23.936 25.44 23.936-25.44z"></path>
		   </symbol>
		   <symbol id="olymp-accordion-open-icon" viewBox="0 0 32 32">
		      <title>accordion-open-icon</title>
		      <path d="M32 12.8v6.4h-32v-6.4h32z"></path>
		      <path d="M19.2 32h-6.4v-32h6.4v32z"></path>
		   </symbol>
		   <symbol id="olymp-comments-post-icon" viewBox="0 0 36 32">
		      <title>comments-post-icon</title>
		      <path d="M32 0h-28c-2.21 0-4 1.792-4 4v18c0 2.208 1.792 4 4 4 0 0 0.75 0 2 0v-4h-2v-18h28v22c2.208 0 4-1.792 4-4v-18c0-2.208-1.792-4-4-4zM18 26h2v-4h-2v4zM24 26h4v-4h-4v4zM8 12h20v-4h-20v4zM8 18h12v-4h-12v4z"></path>
		      <path d="M18 22l-8 4.282v-4.282h-4v10l12-6v-4z"></path>
		   </symbol>
		   <symbol id="olymp-accordion-close-icon" viewBox="0 0 32 32">
		      <title>accordion-close-icon</title>
		      <path d="M32 12.8v6.4h-32v-6.4h32z"></path>
		   </symbol>
		   <symbol id="olymp-play-icon" viewBox="0 0 28 32">
		      <title>play-icon</title>
		      <path d="M24.71 10.664l-15.614-9.574c-1.146-0.698-2.312-1.048-3.478-1.048-2.792 0-5.618 2.188-5.618 6.368v5.59h4c0-4.784 0-5.592 0-5.592 0-1.498 0.628-2.368 1.618-2.368 0.408 0 0.876 0.148 1.388 0.458l15.63 9.584c1.758 1.066 1.848 2.812 0.088 3.878l-15.718 9.58c-0.512 0.314-0.982 0.46-1.39 0.46-0.988 0-1.616-0.868-1.616-2.364 0 0 0-0.6 0-1.586 0-0.012 0-0.036 0-0.048h-4v1.634c0 4.178 2.826 6.364 5.616 6.364 1.166 0 2.334-0.35 3.47-1.042l15.72-9.58c2.026-1.23 3.194-3.164 3.194-5.302 0.002-2.172-1.198-4.144-3.29-5.412z"></path>
		      <path d="M0 16h4v4h-4v-4z"></path>
		   </symbol>
		   <symbol id="olymp-remove-playlist-icon" viewBox="0 0 38 32">
		      <title>remove-playlist-icon</title>
		      <path d="M8.813 19.202c0.442 0 0.8 0.358 0.8 0.8v8.002c0 0.44-0.358 0.797-0.8 0.797s-0.8-0.357-0.8-0.797v-8.002c0-0.442 0.358-0.8 0.8-0.8zM8.813 16.002c-2.206 0-4 1.795-4 4v8.002c0 2.203 1.794 3.997 4 3.997s4-1.794 4-3.997v-8.002c0-2.205-1.794-4-4-4v0z"></path>
		      <path d="M6.275 27.138c-1.694-0.067-3.050-1.451-3.050-3.163s1.357-3.096 3.050-3.163v-3.2c-3.475 0.070-6.275 2.896-6.275 6.389s2.8 6.318 6.275 6.387v-3.25z"></path>
		      <path d="M23.186 19.202c0.442 0 0.8 0.358 0.8 0.8v8.002c0 0.44-0.358 0.797-0.8 0.797s-0.8-0.357-0.8-0.797v-8.002c0-0.442 0.358-0.8 0.8-0.8zM23.186 16.002c-2.206 0-4 1.795-4 4v8.002c0 2.203 1.794 3.997 4 3.997 2.205 0 3.998-1.794 3.998-3.997v-8.002c0-2.205-1.794-4-3.998-4v0z"></path>
		      <path d="M25.725 27.138c1.694-0.067 3.050-1.451 3.050-3.163s-1.357-3.096-3.050-3.163v-3.2c3.475 0.070 6.275 2.896 6.275 6.389s-2.8 6.318-6.275 6.387v-3.25z"></path>
		      <path d="M3.963 11.683c-0.485 1.35-0.763 2.8-0.763 4.317v4.218h3.2v-4.218c0-0.848 0.122-1.666 0.328-2.448l-2.765-1.869z"></path>
		      <path d="M16 3.2c-1.518 0-2.968 0.278-4.32 0.763l1.862 2.766c0.787-0.208 1.606-0.33 2.458-0.33 5.294 0 9.6 4.306 9.6 9.6v4.218h3.2v-4.218c0-7.069-5.731-12.8-12.8-12.8z"></path>
		      <path d="M6.434 6.366h3.2v3.2h-3.2v-3.2z"></path>
		      <path d="M28.8 0h9.6v3.2h-9.6v-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-save-playlist-icon" viewBox="0 0 35 32">
		      <title>save-playlist-icon</title>
		      <path d="M8.012 20.365c0.401 0 0.727 0.326 0.727 0.727v7.274c0 0.4-0.326 0.724-0.727 0.724s-0.727-0.324-0.727-0.724v-7.274c0-0.401 0.326-0.727 0.727-0.727zM8.012 17.456c-2.006 0-3.636 1.632-3.636 3.636v7.274c0 2.003 1.631 3.633 3.636 3.633s3.636-1.631 3.636-3.633v-7.274c0-2.004-1.631-3.636-3.636-3.636v0z"></path>
		      <path d="M5.705 27.58c-1.54-0.061-2.772-1.319-2.772-2.876s1.233-2.815 2.772-2.876v-2.909c-3.159 0.064-5.705 2.633-5.705 5.808s2.545 5.744 5.705 5.807v-2.954z"></path>
		      <path d="M21.078 20.365c0.401 0 0.727 0.326 0.727 0.727v7.274c0 0.4-0.326 0.724-0.727 0.724s-0.727-0.324-0.727-0.724v-7.274c0-0.401 0.326-0.727 0.727-0.727zM21.078 17.456c-2.006 0-3.636 1.632-3.636 3.636v7.274c0 2.003 1.631 3.633 3.636 3.633 2.004 0 3.635-1.631 3.635-3.633v-7.274c0-2.004-1.631-3.636-3.635-3.636v0z"></path>
		      <path d="M23.386 27.58c1.54-0.061 2.772-1.319 2.772-2.876s-1.233-2.815-2.772-2.876v-2.909c3.159 0.064 5.705 2.633 5.705 5.808s-2.545 5.744-5.705 5.807v-2.954z"></path>
		      <path d="M3.603 13.53c-0.441 1.228-0.694 2.545-0.694 3.924v3.834h2.909v-3.834c0-0.771 0.111-1.514 0.298-2.225l-2.513-1.699z"></path>
		      <path d="M14.545 5.818c-1.38 0-2.698 0.253-3.927 0.694l1.693 2.515c0.716-0.189 1.46-0.3 2.234-0.3 4.813 0 8.727 3.914 8.727 8.727v3.834h2.909v-3.834c0-6.426-5.21-11.636-11.636-11.636z"></path>
		      <path d="M5.849 8.697h2.909v2.909h-2.909v-2.909z"></path>
		      <path d="M29.091 0h2.909v8.727h-2.909v-8.727z"></path>
		      <path d="M26.182 2.909h8.727v2.909h-8.727v-2.909z"></path>
		   </symbol>
		   <symbol id="olymp-share-icon" viewBox="0 0 40 32">
		      <title>share-icon</title>
		      <path d="M11.168 16.788v3.046h9.132v3.048h-9.132v3.072l-6.095-4.584 6.095-4.582zM14.216 10.683l-14.216 10.685 14.216 10.688v-6.129h9.132v-9.144h-9.132v-6.1z"></path>
		      <path d="M15.739 6.095h3.048v3.048h-3.048v-3.048z"></path>
		      <path d="M35.854 8.25l-10.973-8.25v6.1h-3.048v3.049h6.095v-3.046l6.095 4.582-6.095 4.582v-3.072h-12.18v3.048h9.132v6.129l14.214-10.686z"></path>
		   </symbol>
		   <symbol id="olymp-heart-icon" viewBox="0 0 36 32">
		      <title>heart-icon</title>
		      <path d="M23.111 21.333h3.556v3.556h-3.556v-3.556z"></path>
		      <path d="M32.512 2.997c-2.014-2.011-4.263-3.006-7.006-3.006-2.62 0-5.545 2.089-7.728 4.304-2.254-2.217-5.086-4.295-7.797-4.295-2.652 0-4.99 0.793-6.937 2.738-4.057 4.043-4.057 10.599 0 14.647 1.157 1.157 12.402 13.657 12.402 13.657 0.64 0.638 1.481 0.958 2.32 0.958s1.678-0.32 2.318-0.958l1.863-2.012-2.523-2.507-1.655 1.787c-2.078-2.311-11.095-12.324-12.213-13.442-1.291-1.285-2-2.994-2-4.811 0-1.813 0.709-3.518 2-4.804 1.177-1.175 2.54-1.698 4.425-1.698 0.464 0 2.215 0.236 5.303 3.273l2.533 2.492 2.492-2.532c2.208-2.242 4.201-3.244 5.196-3.244 1.769 0 3.113 0.588 4.496 1.97 1.289 1.284 1.998 2.99 1.998 4.804 0 1.815-0.709 3.522-1.966 4.775-0.087 0.085-0.098 0.094-1.9 2.041l-0.156 0.167 2.523 2.51 0.24-0.26c0 0 1.742-1.881 1.774-1.911 4.055-4.043 4.055-10.603-0.002-14.644z"></path>
		   </symbol>
		   <symbol id="olymp-magnifying-glass-icon" viewBox="0 0 34 32">
		      <title>magnifying-glass-icon</title>
		      <path d="M20.809 3.57c-4.76-4.76-12.478-4.76-17.239 0s-4.76 12.48 0 17.239c4.76 4.76 12.48 4.76 17.239 0 4.76-4.759 4.76-12.478 0-17.239zM18.654 18.654c-3.57 3.57-9.361 3.57-12.93 0-3.57-3.57-3.57-9.359 0-12.93s9.361-3.57 12.93 0c3.57 3.569 3.57 9.359 0 12.93z"></path>
		      <path d="M24.022 21.907l2.154-2.156 2.157 2.155-2.154 2.156-2.157-2.155z"></path>
		      <path d="M28.34 28.364c-0.596 0.597-1.559 0.597-2.155 0l-6.464-6.464-0.834-0.852 4.3-4.3-1.312-1.314-6.466 6.466 8.62 8.619c1.783 1.783 4.683 1.783 6.464 0 1.783-1.781 1.783-4.681 0-6.464l-2.155 2.155c0.596 0.596 0.594 1.562 0 2.155z"></path>
		   </symbol>
		   <symbol id="olymp-cupcake-icon" viewBox="0 0 27 32">
		      <title>cupcake-icon</title>
		      <path d="M5.349 32h3.984v-2.667h-1.671l-0.933-6.541 12.959-0.063 0.312-0.063h-15.979z"></path>
		      <path d="M20 22.667l-0.963 6.667h-1.704v2.667h4.016l1.339-9.333z"></path>
		      <path d="M25 12.908c-0.921-2.695-3.583-4.743-7.667-4.891v2.673c2.639 0.121 4.513 1.237 5.143 3.080 0.157 0.457 0.435 0.864 0.805 1.176 0.451 0.379 0.719 1.028 0.719 1.737 0 0.649-0.232 1.251-0.635 1.648-0.377 0.372-0.636 0.849-0.74 1.368-0.195 0.957-1.133 1.651-2.203 1.652-0.375-0.047-1.288-0.669-1.587-0.873-0.447-0.305-0.972-0.464-1.503-0.464-0.173 0-0.347 0.017-0.519 0.051-0.7 0.139-1.317 0.553-1.709 1.151-0.605 0.919-1.267 1.468-1.772 1.468-0.596 0-1.305-0.757-1.771-1.467-0.392-0.597-1.008-1.013-1.709-1.152-0.173-0.033-0.347-0.049-0.52-0.049-0.531 0-1.055 0.159-1.5 0.463-0.301 0.204-1.216 0.828-1.557 0.873-1.101 0-2.040-0.695-2.233-1.651-0.105-0.52-0.363-0.996-0.74-1.368-0.405-0.4-0.636-1-0.636-1.649 0-0.709 0.268-1.359 0.717-1.736 0.371-0.312 0.649-0.719 0.805-1.177 0.588-1.716 2.545-2.885 5.144-3.079v-2.675c-3.924 0.225-6.751 2.212-7.667 4.891-1.005 0.847-1.667 2.217-1.667 3.776 0 1.428 0.561 2.691 1.427 3.545 0.436 2.157 2.437 3.789 4.848 3.789 1.073 0 2.248-0.784 3.059-1.336 0.871 1.327 2.227 2.669 4 2.669s3.128-1.343 4-2.669c0.809 0.552 1.984 1.336 3.059 1.336 2.411 0 4.412-1.632 4.848-3.789 0.865-0.856 1.427-2.117 1.427-3.545 0-1.559-0.661-2.929-1.667-3.776z"></path>
		      <path d="M12 29.333h2.667v2.667h-2.667v-2.667z"></path>
		      <path d="M12 13.332h2.667v-8h-2.667v8zM13.333 0c-0.737 0-1.333 0.596-1.333 1.332v1.333c0 0.736 0.596 1.333 1.333 1.333s1.333-0.597 1.333-1.333v-1.333c0-0.736-0.596-1.332-1.333-1.332z"></path>
		   </symbol>
		   <symbol id="olymp-weather-icon" viewBox="0 0 38 32">
		      <title>weather-icon</title>
		      <path d="M18.909 29.091h2.909v2.909h-2.909v-2.909z"></path>
		      <path d="M28.236 21.393c0-3.446-3.037-6.243-6.828-6.353-1.809-2.070-4.609-3.405-7.76-3.405-5.252 0-9.536 3.697-9.852 8.362-2.256 1.062-3.796 3.185-3.796 5.638 0 3.516 3.159 6.365 7.059 6.365h8.941v-2.909h-8.941c-2.288 0-4.15-1.549-4.15-3.456 0-1.238 0.815-2.39 2.124-3.005l1.548-0.729 0.116-1.708c0.214-3.168 3.267-5.649 6.95-5.649 2.201 0 4.231 0.879 5.571 2.41l0.836 0.956 1.27 0.036c2.208 0.065 4.004 1.61 4.004 3.446v2.016l1.887 0.707c1.139 0.431 1.876 1.36 1.876 2.368 0 0.644 0 2.608-3.209 2.608h-1.155v2.909h1.155c3.379 0 6.118-1.789 6.118-5.517 0-2.294-1.553-4.26-3.764-5.089z"></path>
		      <path d="M21.818 7.273c-4.016 0-7.363 2.727-8.38 6.419l2.561 0.855 0.179 0.087c0.615-2.551 2.899-4.452 5.639-4.452 3.213 0 5.818 2.607 5.818 5.818 0 1.686-0.729 3.193-1.875 4.257 0.522 0.682 1.168 1.529 1.756 2.304 1.841-1.603 3.028-3.932 3.028-6.561 0-4.819-3.908-8.727-8.727-8.727zM13.693 5.818l-2.057-2.058c-0.569-0.567-1.489-0.567-2.057 0-0.569 0.57-0.569 1.489 0 2.058l2.057 2.057c0.569 0.57 1.488 0.57 2.057 0 0.569-0.567 0.569-1.487 0-2.057zM21.818 5.818c0.804 0 1.455-0.652 1.455-1.455v-2.909c0-0.801-0.65-1.455-1.455-1.455s-1.455 0.653-1.455 1.456v2.909c0 0.801 0.65 1.453 1.455 1.453zM36.364 13.091h-2.909c-0.804 0-1.455 0.652-1.455 1.456s0.65 1.453 1.455 1.453h2.909c0.804 0 1.455-0.649 1.455-1.453s-0.65-1.456-1.455-1.456z"></path>
		      <path d="M33.277 3.223c0.57 0.569 0.567 1.487-0.001 2.057l-2.057 2.057c-0.569 0.569-1.487 0.57-2.057 0.001-0.569-0.57-0.569-1.489 0-2.060l2.057-2.057c0.569-0.569 1.488-0.567 2.058 0.001z"></path>
		   </symbol>
		   <symbol id="olymp-star-icon" viewBox="0 0 32 32">
		      <title>star-icon</title>
		      <path d="M24.029 27.192h3.2v3.2h-3.2v-3.2z"></path>
		      <path d="M31.88 11.91c-0.275-0.826-0.984-1.43-1.837-1.562l-8.309-1.28-3.611-7.763c-0.379-0.816-1.194-1.336-2.090-1.336-0.893 0-1.707 0.522-2.086 1.336l-3.613 7.763-8.309 1.28c-0.854 0.131-1.563 0.736-1.838 1.562-0.275 0.827-0.067 1.739 0.536 2.36l6.088 6.298-1.413 8.731c-0.142 0.88 0.226 1.762 0.947 2.277 0.397 0.28 0.862 0.424 1.328 0.424 0.384 0 0.766-0.098 1.115-0.291l7.243-4.037 4.768 2.656v-3.662l-4.768-2.658-7.184 4.005 1.378-8.517-1.114-1.154-4.922-5.090 8.323-1.282 0.723-1.552 2.798-6.014 3.52 7.566 8.326 1.283-6.038 6.243 0.733 4.53h3.242l-0.56-3.458 6.091-6.298c0.6-0.622 0.806-1.534 0.531-2.362z"></path>
		   </symbol>
		   <symbol id="olymp-headphones-icon" viewBox="0 0 36 32">
		      <title>headphones-icon</title>
		      <path d="M9.792 17.78c0.491 0 0.889 0.398 0.889 0.889v8.891c0 0.489-0.398 0.885-0.889 0.885s-0.889-0.396-0.889-0.885v-8.891c0-0.491 0.398-0.889 0.889-0.889zM9.792 14.224c-2.452 0-4.444 1.995-4.444 4.444v8.891c0 2.448 1.993 4.441 4.444 4.441s4.444-1.993 4.444-4.441v-8.891c0-2.45-1.993-4.444-4.444-4.444v0z"></path>
		      <path d="M6.972 26.597c-1.883-0.075-3.388-1.612-3.388-3.515s1.508-3.44 3.388-3.515v-3.556c-3.861 0.078-6.972 3.218-6.972 7.099s3.111 7.020 6.972 7.097v-3.611z"></path>
		      <path d="M25.762 17.78c0.491 0 0.889 0.398 0.889 0.889v8.891c0 0.489-0.398 0.885-0.889 0.885s-0.889-0.396-0.889-0.885v-8.891c0-0.491 0.398-0.889 0.889-0.889zM25.762 14.224c-2.452 0-4.444 1.995-4.444 4.444v8.891c0 2.448 1.993 4.441 4.444 4.441 2.45 0 4.443-1.993 4.443-4.441v-8.891c0-2.45-1.993-4.444-4.443-4.444v0z"></path>
		      <path d="M28.583 26.597c1.883-0.075 3.388-1.612 3.388-3.515s-1.508-3.44-3.388-3.515v-3.556c3.861 0.078 6.972 3.218 6.972 7.099s-3.111 7.020-6.972 7.097v-3.611z"></path>
		      <path d="M4.404 9.426c-0.539 1.5-0.848 3.111-0.848 4.796v4.686h3.556v-4.686c0-0.942 0.135-1.851 0.364-2.72l-3.072-2.076z"></path>
		      <path d="M17.778 0c-1.687 0-3.298 0.309-4.8 0.848l2.069 3.074c0.875-0.231 1.785-0.366 2.731-0.366 5.883 0 10.667 4.784 10.667 10.667v4.686h3.556v-4.686c0-7.854-6.368-14.222-14.222-14.222z"></path>
		      <path d="M7.148 3.518h3.556v3.556h-3.556v-3.556z"></path>
		   </symbol>
		   <symbol id="olymp-block-from-chat-icon" viewBox="0 0 35 32">
		      <title>block-from-chat-icon</title>
		      <path d="M32 0h-28.8c-1.768 0-3.2 1.434-3.2 3.2v16c0 1.766 1.434 3.2 3.2 3.2 0 0 0.6 0 1.6 0v-3.2h-1.6v-16h28.8v19.2c1.766 0 3.2-1.434 3.2-3.2v-16c0-1.766-1.434-3.2-3.2-3.2zM20.8 22.4h1.6v-3.2h-1.6v3.2zM25.6 22.4h3.2v-3.2h-3.2v3.2z"></path>
		      <path d="M17.6 19.2l-9.6 6.626v-6.626h-3.2v12.8l12.8-9.6h3.2v-3.2z"></path>
		      <path d="M22.125 8.938l-2.262-2.262-2.262 2.262-2.262-2.262-2.264 2.262 2.262 2.262-2.262 2.264 2.264 2.262 2.262-2.262 2.262 2.262 2.262-2.262-2.262-2.264z"></path>
		   </symbol>
		   <symbol id="olymp-add-to-conversation-icon" viewBox="0 0 35 32">
		      <title>add-to-conversation-icon</title>
		      <path d="M32 0h-28.8c-1.768 0-3.2 1.434-3.2 3.2v16c0 1.766 1.434 3.2 3.2 3.2 0 0 0.6 0 1.6 0v-3.2h-1.6v-16h28.8v19.2c1.766 0 3.2-1.434 3.2-3.2v-16c0-1.766-1.434-3.2-3.2-3.2zM20.8 22.4h1.6v-3.2h-1.6v3.2zM25.6 22.4h3.2v-3.2h-3.2v3.2z"></path>
		      <path d="M17.6 19.2l-9.6 6.626v-6.626h-3.2v12.8l12.8-9.6h3.2v-3.2z"></path>
		      <path d="M22.4 9.6h-3.2v-3.2h-3.2v3.2h-3.2v3.2h3.2v3.2h3.2v-3.2h3.2z"></path>
		   </symbol>
		   <symbol id="olymp-speech-balloon-icon" viewBox="0 0 35 32">
		      <title>speech-balloon-icon</title>
		      <path d="M32 0h-28.8c-1.768 0-3.2 1.434-3.2 3.2v16c0 1.766 1.434 3.2 3.2 3.2 0 0 0.6 0 1.6 0v-3.2h-1.6v-16h28.8v19.2c1.766 0 3.2-1.434 3.2-3.2v-16c0-1.766-1.434-3.2-3.2-3.2zM20.8 22.4h1.6v-3.2h-1.6v3.2zM25.6 22.4h3.2v-3.2h-3.2v3.2zM27.2 6.4h-20.8v3.2h20.8v-3.2zM6.4 16h12.8v-3.2h-12.8v3.2z"></path>
		      <path d="M17.6 19.2l-9.6 6.626v-6.626h-3.2v12.8l12.8-9.6h3.2v-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-add-a-place-icon" viewBox="0 0 26 32">
		      <title>add-a-place-icon</title>
		      <path d="M13.091 0.001c-5.697 0-10.531 3.645-12.33 8.726h3.145c1.639-3.433 5.135-5.817 9.185-5.817 5.613 0 10.182 4.567 10.182 10.182 0 7.971-7.881 15.129-10.177 15.956-1.953-0.71-7.364-5.712-9.396-11.594h-3.040c2.268 7.964 9.923 14.545 12.432 14.545 2.957 0 13.091-8.95 13.091-18.908 0-7.231-5.86-13.091-13.091-13.091z"></path>
		      <path d="M13.091 7.316c-3.213 0-5.818 2.605-5.818 5.818 0 3.215 2.605 5.818 5.818 5.818s5.818-2.604 5.818-5.818c0-3.215-2.605-5.818-5.818-5.818zM13.091 16.045c-1.606 0-2.909-1.303-2.909-2.909s1.303-2.909 2.909-2.909 2.909 1.303 2.909 2.909-1.303 2.909-2.909 2.909z"></path>
		      <path d="M0 11.636h2.909v2.909h-2.909v-2.909z"></path>
		   </symbol>
		   <symbol id="olymp-chat---messages-icon" viewBox="0 0 40 32">
		      <title>chat---messages-icon</title>
		      <path d="M24.381 7.621h-21.333c-1.378 0-3.048 1.606-3.048 3.046v13.716c0 1.443 1.67 3.048 3.048 3.048v4.57l12.19-4.568v-3.051l-9.143 3.051v-3.051h-3.048v-13.714h21.333v16.763c1.378 0 3.048-1.605 3.048-3.048v-13.716c0-1.44-1.67-3.046-3.048-3.046zM18.286 27.432h3.048v-3.048h-3.048v3.048zM6.095 16.763h15.238v-3.046h-15.238v3.046zM6.095 21.336h9.143v-3.048h-9.143v3.048zM15.238 3.051h24.381c0-1.443-1.67-3.049-3.048-3.049h-21.333c-1.378 0-3.048 1.606-3.048 3.049v1.527h3.048v-1.527zM36.571 16.763l-4.571-0.002v3.051l-3.048-1.016v3.301l6.095 2.284v-4.568c0.779 0 1.524 0 1.524 0 1.378 0 3.048-1.606 3.048-3.049v-4.571h-3.048v4.571zM36.571 9.144h3.048v-3.048h-3.048v3.048z"></path>
		   </symbol>
		   <symbol id="olymp-check-icon" viewBox="0 0 37 32">
		      <title>check-icon</title>
		      <path d="M11.243 23.184l-7.424-7.421-3.712 3.712 11.136 11.136 18.557-18.557-3.712-3.715-14.845 14.845zM33.512 0.915l-3.712 3.712 3.712 3.712 3.712-3.712-3.712-3.712z"></path>
		   </symbol>
		   <symbol id="olymp-plus-icon" viewBox="0 0 32 32">
		      <title>plus-icon</title>
		      <path d="M18.286 0h-4.571v13.714h-13.714v4.571h13.714v13.714h4.571v-13.714h4.571v-4.571h-4.571v-13.714zM27.429 13.714v4.571h4.571v-4.571h-4.571z"></path>
		   </symbol>
		   <symbol id="olymp-albums-icon" viewBox="0 0 32 32">
		      <title>albums-icon</title>
		      <path d="M17.778 0v14.222h14.222v-14.222h-14.222zM28.444 10.667h-7.111v-7.111h7.111v7.111zM0 32h14.222v-14.222h-14.222v14.222zM3.556 21.333h7.111v7.111h-7.111v-7.111zM28.444 28.444h-7.111v-7.111h3.556v-3.556h-7.111v14.222h14.222v-7.111h-3.556v3.556zM0 14.222h14.222v-14.222h-14.222v14.222zM3.556 3.556h7.111v7.111h-7.111v-7.111zM28.444 21.333h3.556v-3.556h-3.556v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-photos-icon" viewBox="0 0 29 32">
		      <title>photos-icon</title>
		      <path d="M6.4 22.402h16v-16h-16v16zM9.6 9.602h9.6v9.6h-9.6v-9.6zM25.6 32h3.2v-3.2h-3.2v3.2zM25.6 0h-22.4c-1.766 0-3.2 1.432-3.2 3.2v25.6c0 1.766 1.434 3.2 3.2 3.2h19.2v-3.2h-19.2v-25.6h22.4v22.398h3.2v-22.398c0-1.768-1.434-3.2-3.2-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-day-calendar-icon" viewBox="0 0 26 32">
		      <title>day-calendar-icon</title>
		      <path d="M23.273 32h2.909v-2.908h-2.909v2.908zM11.636 21.818h2.909v-2.908h-2.909v2.908zM23.273 2.911h-2.909v-1.456c0-0.803-0.652-1.455-1.455-1.455-0.804 0-1.455 0.652-1.455 1.455v1.455h-8.727v-1.455c0-0.803-0.652-1.455-1.455-1.455-0.804 0-1.455 0.652-1.455 1.455v1.455h-2.909c-1.606 0-2.909 1.302-2.909 2.909v23.273c0 1.607 1.303 2.909 2.909 2.909h17.455v-2.908h-17.455v-23.274h2.909v1.455c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.455h8.727v1.455c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.455h2.909v20.364h2.909v-20.364c0-1.606-1.303-2.908-2.909-2.908zM7.273 26.185h11.636v-11.636h-11.636v11.636zM10.182 17.457h5.818v5.818h-5.818v-5.818z"></path>
		   </symbol>
		   <symbol id="olymp-week-calendar-icon" viewBox="0 0 26 32">
		      <title>week-calendar-icon</title>
		      <path d="M23.273 32h2.909v-2.908h-2.909v2.908zM23.273 2.911h-2.909v-1.456c0-0.803-0.652-1.455-1.455-1.455-0.804 0-1.455 0.652-1.455 1.455v1.455h-8.727v-1.455c0-0.803-0.652-1.455-1.455-1.455-0.804 0-1.455 0.652-1.455 1.455v1.455h-2.909c-1.606 0-2.909 1.302-2.909 2.909v23.273c0 1.607 1.303 2.909 2.909 2.909h17.455v-2.908h-17.455v-23.274h2.909v1.455c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.455h8.727v1.455c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.455h2.909v20.364h2.909v-20.364c0-1.606-1.303-2.908-2.909-2.908zM7.273 26.182h11.636v-2.908h-11.636v2.908zM18.909 18.909h-11.636v2.911h11.636v-2.911zM18.909 14.545h-11.636v2.909h11.636v-2.909z"></path>
		   </symbol>
		   <symbol id="olymp-month-calendar-icon" viewBox="0 0 26 32">
		      <title>month-calendar-icon</title>
		      <path d="M23.273 32h2.909v-2.908h-2.909v2.908zM23.273 2.911h-2.909v-1.456c0-0.803-0.65-1.455-1.455-1.455s-1.455 0.652-1.455 1.455v1.455h-8.727v-1.455c0-0.803-0.652-1.455-1.455-1.455-0.804 0-1.455 0.652-1.455 1.455v1.455h-2.909c-1.606 0-2.909 1.302-2.909 2.909v23.273c0 1.607 1.303 2.909 2.909 2.909h17.455v-2.908h-17.455v-23.274h2.909v1.455c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.455h8.727v1.455c0 0.803 0.65 1.455 1.455 1.455s1.455-0.652 1.455-1.455v-1.455h2.909v20.364h2.909v-20.364c0-1.606-1.303-2.908-2.909-2.908zM7.273 26.182h2.909v-2.909h-2.909v2.909zM11.636 26.182h2.909v-2.909h-2.909v2.909zM16 26.182h2.909v-2.909h-2.909v2.909zM10.182 18.909h-2.909v2.911h2.909v-2.911zM14.545 18.909h-2.909v2.911h2.909v-2.911zM18.909 18.909h-2.909v2.911h2.909v-2.911zM10.182 14.545h-2.909v2.909h2.909v-2.909zM14.545 14.545h-2.909v2.909h2.909v-2.909zM18.909 14.545h-2.909v2.909h2.909v-2.909z"></path>
		   </symbol>
		   <symbol id="olymp-checked-calendar-icon" viewBox="0 0 26 32">
		      <title>checked-calendar-icon</title>
		      <path d="M23.273 31.999h2.909v-2.908h-2.909v2.908zM23.273 2.909h-2.909v-1.455c0-0.803-0.65-1.455-1.455-1.455s-1.455 0.652-1.455 1.455v1.455h-8.727v-1.455c0-0.803-0.652-1.455-1.455-1.455-0.804 0-1.455 0.652-1.455 1.455v1.455h-2.909c-1.606 0-2.909 1.302-2.909 2.909v23.273c0 1.606 1.303 2.908 2.909 2.908h17.455v-2.908h-17.455v-23.273h2.909v1.455c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.455h8.727v1.455c0 0.803 0.65 1.455 1.455 1.455s1.455-0.652 1.455-1.455v-1.455h2.909v20.364h2.909v-20.364c0-1.607-1.303-2.909-2.909-2.909zM11.033 19.513l-2.057-2.057-2.057 2.057 4.115 4.113 8.227-8.228-2.057-2.057-6.172 6.172z"></path>
		   </symbol>
		   <symbol id="olymp-multimedia-icon" viewBox="0 0 32 32">
		      <title>multimedia-icon</title>
		      <path d="M28.8 0.002h-22.4v3.2h22.4v5.41l-11.57 5.786-7.579-8.496-6.451 5.166v-4.666h-3.2v22.4c0 1.766 1.434 3.198 3.2 3.198h25.6c1.766 0 3.2-1.432 3.2-3.198v-25.602c0-1.766-1.434-3.198-3.2-3.198zM3.2 15.168l6.203-4.963 7.872 8.995h-14.075v-4.032zM28.8 28.802h-25.6v-6.402h25.6v6.402zM28.8 19.2h-7.285l-2.078-2.33 9.363-4.682v7.011zM3.2 0.002h-3.2v3.2h3.2v-3.2zM11.2 24h-3.2v3.2h3.2v-3.2zM17.6 24h-3.2v3.2h3.2v-3.2zM24 24h-3.2v3.2h3.2v-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-settings-v2-icon" viewBox="0 0 32 32">
		      <title>settings-v2-icon</title>
		      <path d="M8.889 21.333c-2.32 0-4.272 1.488-5.006 3.556h-3.883v3.556h3.883c0.734 2.066 2.686 3.556 5.006 3.556s4.272-1.49 5.006-3.556h10.994v-3.556h-10.994c-0.734-2.068-2.686-3.556-5.006-3.556zM10.667 28.444h-3.556v-3.556h3.556v3.556zM23.111 10.667c-2.32 0-4.272 1.49-5.006 3.556h-18.105v3.556h18.105c0.734 2.068 2.688 3.556 5.006 3.556s4.272-1.49 5.006-3.556h3.883v-3.556h-3.883c-0.734-2.068-2.686-3.556-5.006-3.556zM24.889 17.778h-3.556v-3.556h3.556v3.556zM13.895 3.556c-0.734-2.068-2.686-3.556-5.006-3.556s-4.272 1.488-5.006 3.556h-3.883v3.556h3.883c0.734 2.066 2.686 3.556 5.006 3.556s4.272-1.488 5.006-3.556h18.105v-3.556h-18.105zM10.667 7.111h-3.556v-3.556h3.556v3.556zM28.444 28.444h3.556v-3.556h-3.556v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-close-icon" viewBox="0 0 32 32">
		      <title>close-icon</title>
		      <path d="M14.222 17.778h3.556v-3.556h-3.556v3.556zM31.084 3.429l-2.514-2.514-10.057 10.057 2.514 2.514 10.057-10.057zM0.916 28.571l2.514 2.514 10.057-10.055-2.516-2.514-10.055 10.055zM18.514 21.029l10.057 10.055 2.514-2.514-10.057-10.055-2.514 2.514zM0.916 3.431l10.057 10.055 2.516-2.514-10.059-10.057-2.514 2.516z"></path>
		   </symbol>
		   <symbol id="olymp-logout-icon" viewBox="0 0 43 32">
		      <title>logout-icon</title>
		      <path d="M26.667 3.557c4.962 0 9.232 2.91 11.23 7.111h3.838c-2.197-6.212-8.105-10.668-15.068-10.668s-12.873 4.457-15.070 10.667h3.84c1.998-4.199 6.268-7.109 11.23-7.109zM26.667 28.446c-4.962 0-9.232-2.91-11.23-7.111h-3.84c2.199 6.21 8.107 10.665 15.070 10.665 6.962 0 12.871-4.455 15.070-10.665h-3.838c-2 4.201-6.27 7.111-11.232 7.111zM23.111 17.778v-3.556h-16.306l3.252-3.25-2.514-2.514-7.543 7.541 7.543 7.543 2.514-2.514-3.252-3.252h16.306zM39.111 14.224v3.556h3.556v-3.556h-3.556z"></path>
		   </symbol>
		   <symbol id="olymp-settings-icon" viewBox="0 0 32 32">
		      <title>settings-icon</title>
		      <path d="M7.111 3.881v-3.881h-3.556v3.883c-2.068 0.734-3.556 2.686-3.556 5.006s1.488 4.272 3.556 5.006v10.994h3.556v-10.996c2.068-0.734 3.556-2.686 3.556-5.004s-1.488-4.272-3.556-5.008zM7.111 10.667h-3.556v-3.556h3.556v3.556zM28.444 3.881v-3.881h-3.556v3.883c-2.066 0.734-3.556 2.686-3.556 5.006s1.49 4.27 3.556 5.006v18.105h3.556v-18.107c2.066-0.734 3.556-2.686 3.556-5.004s-1.49-4.272-3.556-5.008zM28.444 10.667h-3.556v-3.556h3.556v3.556zM17.778 18.105v-18.105h-3.556v18.105c-2.068 0.734-3.556 2.686-3.556 5.006 0 2.318 1.488 4.27 3.556 5.006v3.883h3.556v-3.883c2.066-0.736 3.556-2.69 3.556-5.006 0-2.32-1.49-4.272-3.556-5.006zM17.778 24.887h-3.556v-3.554h3.556v3.554zM3.556 32h3.556v-3.556h-3.556v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-blog-icon" viewBox="0 0 29 32">
		      <title>blog-icon</title>
		      <path d="M25.6 0h-22.4c-1.766 0-3.2 1.434-3.2 3.2v28.8h22.4v-6.4h6.4v-3.2h-9.6v6.4h-16v-25.6h22.4v9.6h3.2v-9.6c0-1.766-1.434-3.2-3.2-3.2zM22.4 6.4h-16v3.2h16v-3.2zM22.4 12.798h-16v3.202h16v-3.202zM6.4 22.4h9.6v-3.2h-9.6v3.2zM25.6 19.2h3.2v-3.2h-3.2v3.2z"></path>
		   </symbol>
		   <symbol id="olymp-status-icon" viewBox="0 0 36 32">
		      <title>status-icon</title>
		      <path d="M32-0.002h-28.444c-1.963 0-3.556 1.593-3.556 3.557v21.332h3.554v0.004h28.444v-3.557h-28.443v-17.778h28.444v24.889h-24.889v3.556h24.889c1.963 0 3.556-1.593 3.556-3.556v-24.889c0-1.964-1.593-3.557-3.556-3.557zM0 32h3.556v-3.556h-3.556v3.556zM7.109 7.111v3.557h10.667v-3.557h-10.667zM7.109 17.778h21.333v-3.556h-21.333v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-happy-sticker-icon" viewBox="0 0 32 32">
		      <title>happy-sticker-icon</title>
		      <path d="M25.6 0.002h-4.8v3.2h4.8c1.766 0 3.2 1.432 3.2 3.198v12.8h-3.2c-3.534 0-6.4 2.867-6.4 6.402v3.2h-12.8c-1.766 0-3.2-1.434-3.2-3.2v-19.202c0-1.766 1.434-3.198 3.2-3.198h4.8v-3.2h-4.8c-3.534 0-6.4 2.864-6.4 6.398v19.202c0 3.534 2.866 6.398 6.4 6.398h17.6c3.234-3.248 5-4.765 8-7.998v-17.602c0-3.533-2.866-6.398-6.4-6.398zM22.4 28.802v-3.2c0-1.766 1.434-3.2 3.2-3.2h3.2c-1.8 1.618-3.982 3.949-6.4 6.4zM11.2 12.8h-3.2v3.2h3.2v-3.2zM15.978 22.395c2.646 0 4.792-1.358 4.792-3.034v-0.158h-9.586v0.158c0 1.675 2.147 3.034 4.794 3.034zM17.6 0h-3.2v3.2h3.2v-3.2zM23.998 12.8h-3.198v3.2h3.198v-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-happy-face-icon" viewBox="0 0 32 32">
		      <title>happy-face-icon</title>
		      <path d="M16 0c-8.837 0-16 7.16-16 15.989 0 7.166 4.715 13.227 11.213 15.262v-3.39c-4.69-1.899-8-6.49-8-11.859 0-7.070 5.731-12.802 12.8-12.802s12.8 5.731 12.8 12.802c0 5.37-3.312 9.96-8 11.859v3.378c6.485-2.040 11.187-8.094 11.187-15.25 0-8.829-7.165-15.989-16-15.989zM11.211 12.8h-3.2v3.202h3.2v-3.202zM20.813 12.8v3.202h3.2v-3.202h-3.2zM11.198 19.365c0 1.675 2.146 3.032 4.794 3.032s4.794-1.357 4.794-3.032v-0.16h-9.587v0.16zM14.413 32.002h3.2v-3.2h-3.2v3.2z"></path>
		   </symbol>
		   <symbol id="olymp-computer-icon" viewBox="0 0 35 32">
		      <title>computer-icon</title>
		      <path d="M32 22.4h-28.8v-19.2h32c0-1.766-1.434-3.2-3.2-3.2h-28.8c-1.766 0-3.2 1.432-3.2 3.2v19.2c0 1.766 1.434 3.202 3.2 3.202h9.6v3.198h-4.8v3.2h19.2v-3.2h-4.8v-3.198h9.6c1.766 0 3.2-1.434 3.2-3.202v-9.598h-3.2v9.598zM19.2 28.8h-3.2v-3.198h3.2v3.198zM32 9.6h3.2v-3.198h-3.2v3.198zM12.8 14.402v-3.2h-3.2v3.2h3.2zM19.2 14.402v-3.2h-3.2v3.2h3.2zM25.6 14.402v-3.2h-3.2v3.2h3.2z"></path>
		   </symbol>
		   <symbol id="olymp-manage-widgets-icon" viewBox="0 0 39 32">
		      <title>manage-widgets-icon</title>
		      <path d="M0 3.554v24.891c0 1.963 1.593 3.556 3.556 3.556h14.222v-3.556h-14.222v-24.891h14.222v-3.556h-14.222c-1.963 0-3.556 1.593-3.556 3.556zM10.667 24.889v-17.778h-3.556v17.778h3.556zM14.222 24.889h3.556v-17.778h-3.556v17.778zM21.333 3.554h3.556v-3.556h-3.556v3.556zM28.444 3.554h3.556v-3.556h-3.556v3.556zM35.556-0.002v3.556h3.556v-3.556h-3.556zM35.556 10.665h3.556v-3.554h-3.556v3.554zM35.556 17.776h3.556v-3.556h-3.556v3.556zM35.556 24.889h3.556v-3.556h-3.556v3.556zM35.556 32h3.556v-3.556h-3.556v3.556zM28.444 32h3.556v-3.556h-3.556v3.556zM21.333 32h3.556v-3.556h-3.556v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-badge-icon" viewBox="0 0 32 32">
		      <title>badge-icon</title>
		      <path d="M25.6 16c0-5.302-4.299-9.6-9.6-9.6s-9.6 4.298-9.6 9.6c0 5.301 4.299 9.598 9.6 9.598s9.6-4.298 9.6-9.598zM9.6 16c0-3.534 2.866-6.4 6.4-6.4s6.4 2.867 6.4 6.4-2.866 6.402-6.4 6.402-6.4-2.867-6.4-6.402zM16 0c-8.837 0-16 7.163-16 16 0 7.163 4.709 13.227 11.2 15.266v-3.405c-4.69-1.899-8-6.491-8-11.861 0-7.069 5.731-12.8 12.8-12.8s12.8 5.731 12.8 12.8c0 5.37-3.31 9.962-8 11.861v3.405c6.491-2.038 11.2-8.102 11.2-15.266 0-8.837-7.165-16-16-16zM14.4 31.998h3.2v-3.198h-3.2v3.198z"></path>
		   </symbol>
		   <symbol id="olymp-newsfeed-icon" viewBox="0 0 29 32">
		      <title>newsfeed-icon</title>
		      <path d="M6.4 25.602v-3.202h9.6v3.202h-9.6zM6.4 16h16v3.2h-16v-3.2zM22.4 25.602v6.398h-22.4v-28.8c0-1.766 1.434-3.2 3.2-3.2h22.4c1.766 0 3.2 1.434 3.2 3.2v9.6h-25.6v16.002h16v-6.402h9.6v3.202h-6.4zM25.6 9.6v-6.4h-22.4v6.4h22.4zM8 8h-3.2v-3.2h3.2v3.2zM12.8 8h-3.2v-3.2h3.2v3.2zM17.6 8h-3.2v-3.2h3.2v3.2zM25.6 16h3.2v3.2h-3.2v-3.2z"></path>
		   </symbol>
		   <symbol id="olymp-camera-icon" viewBox="0 0 43 32">
		      <title>camera-icon</title>
		      <path d="M21.333 10.667c-3.927 0-7.111 3.182-7.111 7.111 0 3.927 3.184 7.111 7.111 7.111s7.111-3.184 7.111-7.111c0-3.929-3.184-7.111-7.111-7.111zM21.333 21.337c-1.963 0-3.556-1.593-3.556-3.556s1.593-3.556 3.556-3.556 3.556 1.593 3.556 3.556-1.593 3.556-3.556 3.556zM35.556 3.556h-3.556c0-1.964-1.593-3.556-3.556-3.556h-14.222c-1.963 0-3.556 1.591-3.556 3.556h-3.556c-3.927 0-7.111 3.184-7.111 7.111v14.222c0 3.929 3.184 7.111 7.111 7.111 0 0 6.924 0 15.89 0h0.11v-3.556h-16c-1.963 0-3.556-1.593-3.556-3.556v-14.222c0-1.963 1.593-3.556 3.556-3.556h7.111v-3.556h14.222v3.556h7.111c1.963 0 3.556 1.593 3.556 3.556v14.222c0 1.963-1.593 3.556-3.556 3.556h-1.778v3.556c1.122 0 1.778 0 1.778 0 3.927 0 7.111-3.182 7.111-7.111v-14.222c0-3.927-3.184-7.111-7.111-7.111zM26.667 32h3.556v-3.556h-3.556v3.556z"></path>
		   </symbol>
		   <symbol id="olymp-stats-icon" viewBox="0 0 32 32">
		      <title>stats-icon</title>
		      <path d="M23.273 10.182h-2.909v1.236l-3.873 12.589-0.765-5.1h-2.941l1.761 11.745v1.347h2.909v-1.236l4.313-14.015 1.505 5.271v1.252h2.909v-2.909l-2.909-8.932v-1.249zM14.416 10.182l-1.325-8.836v-1.345h-2.909v1.233l-5.818 17.673h-4.364v2.912h7.273v-1.455l3.873-12.371 0.49 2.189h2.78zM29.091 20.364v2.909h2.909v-2.909h-2.909zM14.545 13.091h-2.909v2.908h2.909v-2.908z"></path>
		   </symbol>
		   <symbol id="olymp-calendar-icon" viewBox="0 0 26 32">
		      <title>calendar-icon</title>
		      <path d="M23.273 32h2.909v-2.909h-2.909v2.909zM23.273 2.911h-2.909v-1.456c0-0.801-0.652-1.455-1.455-1.455-0.804 0-1.455 0.653-1.455 1.455v1.456h-8.727v-1.456c0-0.801-0.652-1.455-1.455-1.455-0.804 0-1.455 0.653-1.455 1.455v1.456h-2.909c-1.606 0-2.909 1.302-2.909 2.909v23.271c0 1.607 1.303 2.909 2.909 2.909h17.455v-2.909h-17.455v-23.271h2.909v1.453c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.453h8.727v1.453c0 0.803 0.65 1.455 1.455 1.455 0.803 0 1.455-0.652 1.455-1.455v-1.453h2.909v20.362h2.909v-20.362c0-1.607-1.303-2.909-2.909-2.909zM7.273 26.182h2.909v-2.909h-2.909v2.909zM14.545 26.182v-2.909h-2.909v2.909h2.909zM16 26.182h2.909v-2.909h-2.909v2.909zM14.545 18.909h-7.273v2.909h7.273v-2.909zM18.909 18.909h-2.909v2.909h2.909v-2.909zM14.545 14.547h-7.273v2.908h7.273v-2.908zM18.909 14.547h-2.909v2.908h2.909v-2.908z"></path>
		   </symbol>
		   <symbol id="olymp-happy-faces-icon" viewBox="0 0 33 32">
		      <title>happy-faces-icon</title>
		      <path d="M13.329 5.357c-7.364 0-13.333 5.965-13.333 13.325 0 5.971 3.929 11.023 9.344 12.716v-2.823c-3.908-1.584-6.667-5.409-6.667-9.885 0-5.889 4.776-10.665 10.667-10.665s10.667 4.776 10.667 10.665c0 4.476-2.759 8.303-6.667 9.885v2.815c5.404-1.7 9.323-6.745 9.323-12.708 0-7.36-5.969-13.325-13.333-13.325zM9.34 16.025h-2.667v2.665h2.667v-2.665zM17.34 16.025v2.665h2.667v-2.665h-2.667zM9.328 21.495c0 1.395 1.788 2.527 3.995 2.527s3.995-1.132 3.995-2.527v-0.135h-7.989v0.135zM12.007 32.025h2.667v-2.668h-2.667v2.668zM13.805 2.691h8.868c0 0 1.495 0.417 2.183 0.697l2.397-1.797c-1.747-0.993-3.761-1.565-5.913-1.565-2.856 0-5.475 1.001-7.535 2.665zM32.472 7.56l-2.131 2.129c0.195 0.751 0.331 1.523 0.331 2.336 0 1.756-0.488 3.392-1.333 4.789v4.14c2.452-2.195 4-5.38 4-8.931 0.001-1.58-0.311-3.083-0.867-4.464zM30.673 4.025h-2.667v2.667h2.667v-2.667z"></path>
		   </symbol>
		   <symbol id="olymp-thunder-icon" viewBox="0 0 26 32">
		      <title>thunder-icon</title>
		      <path d="M25.6 11.198h-8l6.4-11.198-18.669 0.005-5.331 17.597h4.798l-1.598 14.398 4.8-4.458v-4.914l-1.6 1.371 1.6-9.602h-3.2l3.2-11.2h9.6l-4.8 11.2h4.8v4.23l8-7.43zM11.2 22.4h3.2v-3.2h-3.2v3.2z"></path>
		   </symbol>
		   <symbol id="olymp-menu-icon" viewBox="0 0 41 32">
		      <title>menu-icon</title>
		      <path d="M4.571 0h-4.571v4.571h4.571v-4.571zM9.143 0v4.571h32v-4.571h-32zM13.714 13.714h-13.714v4.571h13.714v-4.571zM18.286 13.714v4.571h4.571v-4.571h-4.571zM27.429 18.286h13.714v-4.571h-13.714v4.571zM0 32h32v-4.569h-32v4.569zM36.571 32h4.571v-4.569h-4.571v4.569z"></path>
		   </symbol>
		   <symbol id="olymp-shopping-bag-icon" viewBox="0 0 512 512">
		      <path d="m326 512l116 0-23-419-70 0c0-51-42-93-93-93-51 0-93 42-93 93l-70 0-23 419 116 0 0-47-70 0 24-325 23 0 0 46 46 0 0-46 94 0 0 46 46 0 0-46 23 0 24 325-70 0z m-117-419c0-26 21-46 47-46 26 0 47 20 47 46z m24 419l46 0 0-47-46 0z"></path>
		   </symbol>
		   <symbol id="olymp-home-icon" viewBox="0 0 32 32">
		      <title>Home-Icon</title>
		      <path d="M25.6 32h-6.4v-9.6h-6.4v9.6h-6.4c-1.766 0-3.2-1.434-3.2-3.2v-1.6h3.2v1.6h3.2v-9.6h12.8v9.6h3.2v-16l3.2 1.6v14.4c0 1.766-1.434 3.2-3.2 3.2zM3.2 20.8h3.2v3.2h-3.2v-3.2zM3.2 14.4l3.2-1.6v4.8h-3.2v-3.2z"></path>
		      <path d="M16 4.526l11.475 11.474h4.525l-16-16-16 16h4.526z"></path>
		   </symbol>
		   <symbol id="olymp-info-icon" viewBox="0 0 32 32">
		      <title>Info-Icon</title>
		      <path d="M16 0c-8.837 0-16 7.158-16 15.989 0 7.165 4.714 13.226 11.213 15.261v-3.389c-4.69-1.901-8-6.49-8-11.859 0-7.069 5.731-12.798 12.8-12.798s12.8 5.73 12.8 12.798c0 5.37-3.312 9.962-8 11.859v3.376c6.485-2.040 11.187-8.093 11.187-15.248 0-8.83-7.166-15.989-16-15.989zM14.413 24.002h3.2v-9.6h-3.2v9.6zM14.413 11.202h3.2v-3.2h-3.2v3.2zM14.413 32h3.2v-3.2h-3.2v3.2z"></path>
		   </symbol>
		   <symbol id="olymp-stats-icon" viewBox="0 0 32 32">
		      <title>stats-icon</title>
		      <path d="M23.273 10.182h-2.909v1.236l-3.873 12.589-0.765-5.1h-2.941l1.761 11.745v1.347h2.909v-1.236l4.313-14.015 1.505 5.271v1.252h2.909v-2.909l-2.909-8.932v-1.249zM14.416 10.182l-1.325-8.836v-1.345h-2.909v1.233l-5.818 17.673h-4.364v2.912h7.273v-1.455l3.873-12.371 0.49 2.189h2.78zM29.091 20.364v2.909h2.909v-2.909h-2.909zM14.545 13.091h-2.909v2.908h2.909v-2.908z"></path>
		   </symbol>
		   <symbol id="olymp-thunder-icon" viewBox="0 0 26 32">
		      <title>thunder-icon</title>
		      <path d="M25.6 11.198h-8l6.4-11.198-18.669 0.005-5.331 17.597h4.798l-1.598 14.398 4.8-4.458v-4.914l-1.6 1.371 1.6-9.602h-3.2l3.2-11.2h9.6l-4.8 11.2h4.8v4.23l8-7.43zM11.2 22.4h3.2v-3.2h-3.2v3.2z"></path>
		   </symbol>
		   </defs>
		</svg>
		
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		  
		    <symbol id="olymp-music-fullscreen-icon" viewBox="0 0 512 512">
		      <path d="m320 0l0 64 80 0-112 112 48 48 112-112 0 80 64 0 0-192z m-256 128l-64 0 0 64 64 0z m128-64l0-64-192 0 0 64 64 0 0 48 112 112 48-48-112-112z m256 320l64 0 0-64-64 0z m0 16l-112-112-48 48 112 112-80 0 0 64 192 0 0-64-64 0z m-272-112l-112 112 0-80-64 0 0 192 192 0 0-64-80 0 112-112z"></path>
		    </symbol>
		
		    <symbol id="olymp-music-minimize-screen-icon" viewBox="0 0 512 512">
		      <path d="m32 352l80 0-112 112 48 48 112-112 0 80 64 0 0-192-192 0z m320 0l0-64-64 0 0 192 64 0 0-80 112 112 48-48-112-112z m128 0l0-64-64 0 0 64z m-320-240l-112-112-48 48 112 112 48 0 0 64 64 0 0-192-64 0z m-128 48l0 64 64 0 0-64z m448 0l-80 0 112-112-48-48-112 112 0-80-64 0 0 192 192 0z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-next-song-icon" viewBox="0 0 512 512">
		      <path d="m264 199l-167-102c-12-7-25-11-37-11-30 0-60 23-60 68l0 59 43 0c0-51 0-59 0-59 0-16 6-26 17-26 4 0 9 2 15 5l166 103c19 11 20 30 1 41l-167 102c-6 3-11 5-15 5-11 0-17-9-17-25 0 0 0-7 0-17 0 0 0-1 0-1l-43 0 0 18c0 44 30 68 60 68 12 0 25-4 37-11l168-103c21-13 34-33 34-56 0-23-13-44-35-58z m-264 57l43 0 0 43-43 0z m477-57l-167-102c-12-7-24-11-37-11-30 0-60 23-60 68l0 44 43 29c0-6 0-11 0-13 0-52 0-60 0-60 0-16 7-26 17-26 5 0 10 2 15 5l167 103c19 11 19 30 1 41l-168 102c-5 3-10 5-15 5-10 0-17-9-17-25 0 0 0-7 0-17 0-5 0-26 0-49-10 9-21 18-21 19-1 0-10 4-22 8l0 39c0 44 30 68 60 68 13 0 25-4 37-11l168-103c22-13 34-33 34-56 0-23-13-44-35-58z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-no-sound-icon" viewBox="0 0 512 512">
		      <path d="m20 195c-11 0-20 7-20 17l0 88c0 10 9 17 20 17 12 0 21-7 21-17l0-88c0-10-9-17-21-17z m205 41l41 0 0 40-41 0z m0 81l0 50-102-59 0-103 102-60 0 50 41 0c0-40 0-70 0-70 0-21-9-33-23-33-6 0-12 2-20 6l-141 83 0 150 141 83c8 4 14 6 20 6 14 0 23-12 23-32 0 0 0-31 0-71 0 0 0 0 0 0z m258-148l-58 58-58-58-29 29 58 58-58 58 29 29 58-58 58 58 29-29-58-58 58-58z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-open-playlist-icon" viewBox="0 0 512 512">
		      <path d="m0 114l57 0 0-57-57 0z m114-57l0 57 398 0 0-57z m-114 227l57 0 0-56-57 0z m114 0l398 0 0-56-398 0z m-114 171l57 0 0-57-57 0z m114 0l398 0 0-57-398 0z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-pause-icon" viewBox="0 0 512 512">
		      <path d="m373 43c18 0 32 14 32 32l0 362c0 18-14 32-32 32-17 0-32-14-32-32l0-362c0-18 15-32 32-32m0-43c-41 0-74 33-74 75l0 362c0 42 33 75 74 75 42 0 75-33 75-75l0-362c0-42-33-75-75-75z m-234 0c-42 0-75 33-75 75l0 181 43 0 0-181c0-18 14-32 32-32 17 0 32 14 32 32l0 362c0 18-15 32-32 32-18 0-32-14-32-32l0-53-43 0 0 53c0 42 33 75 75 75 41 0 74-33 74-75l0-362c0-42-33-75-74-75z m-75 299l43 0 0 42-43 0z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-play-icon-big" viewBox="0 0 512 512">
		      <path d="m422 183l-254-167c-16-11-33-16-49-16-35 0-72 28-72 88l0 336c0 60 37 88 72 88 16 0 33-5 48-16l257-167c26-17 41-44 41-72 0-29-15-56-43-74z m-24 107l-256 167c-8 6-16 8-23 8-16 0-26-15-26-41 0 0 0-10 0-28 0 0 0 0 0 0l-46 0 0-140 46 0c0-84 0-168 0-168 0-26 10-41 26-41 7 0 15 2 23 8l255 167c28 19 30 49 1 68z m-351 13l46 0 0 46-46 0z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-previous-song-icon" viewBox="0 0 512 512">
		      <path d="m248 199l167-102c12-7 25-11 37-11 30 0 60 23 60 68l0 59-43 0c0-51 0-59 0-59 0-16-6-26-17-26-4 0-9 2-15 5l-166 103c-19 11-20 30-1 41l167 102c6 3 11 5 15 5 11 0 17-9 17-25 0 0 0-7 0-17 0 0 0-1 0-1l43 0 0 18c0 44-30 68-60 68-12 0-25-4-37-11l-168-103c-21-13-34-33-34-56 0-23 13-44 35-58z m221 57l43 0 0 43-43 0z m-434-57l167-102c12-7 24-11 37-11 30 0 60 23 60 68l0 44-43 29c0-6 0-11 0-13 0-52 0-60 0-60 0-16-7-26-17-26-5 0-10 2-15 5l-167 103c-19 11-19 30-1 41l168 102c5 3 10 5 15 5 10 0 17-9 17-25 0 0 0-7 0-17 0-5 0-26 0-49 10 9 21 18 21 19 1 0 11 4 22 8l0 39c0 44-30 68-60 68-13 0-25-4-37-11l-168-103c-22-13-34-33-34-56 0-23 13-44 35-58z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-repeat-icon" viewBox="0 0 512 512">
		      <path d="m384 149l-43 0 0 43 43 0c47 0 85 38 85 85 0 47-38 85-85 85l-85 0 0 43 85 0c71 0 128-57 128-128 0-71-57-128-128-128z m-171 256l43 0 0-43-43 0z m-43-256l-42 0c-71 0-128 57-128 128 0 71 57 128 128 128l43 0 0-43-43 0c-47 0-85-38-85-85 0-47 38-85 85-85l42 0 0 42 86-64-86-63z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-shuffle-icon" viewBox="0 0 512 512">
		      <path d="m293 165c-9 13-23 31-37 52 0-1 0-1 0-1-14-21-28-38-37-51-20-28-49-33-64-32l-66 0 0 45 70 0c1 0 14-1 24 13 11 15 28 40 46 65-18 25-35 50-46 65-10 14-23 13-24 13l-70 0 0 45 66 0c15 1 44-4 64-32 9-13 23-30 37-51 0 0 0 0 0-1 14 21 28 39 37 52 20 27 49 33 64 31l65 0 0-44-69 0c-1 0-14 0-24-13-11-15-28-40-46-65 18-25 35-50 46-65 10-13 23-13 24-13l69 0 0-44-65 0c-15-2-44 4-64 31z m-293 169l45 0 0 45-45 0z m423-245l0 133 89-67z m-423 45l45 0 0 44-45 0z m423 289l89-66-89-67z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-sound-icon" viewBox="0 0 512 512">
		      <path d="m20 197c-11 0-20 8-20 17l0 84c0 10 9 17 20 17 11 0 19-7 19-17l0-84c0-9-8-17-19-17z m197 39l39 0 0 40-39 0z m0 79l0 48-99-57 0-99 99-58 0 48 39 0c0-38 0-67 0-67 0-20-9-32-22-32-6 0-12 2-19 7l-136 79 0 145 136 79c7 4 13 6 19 6 13 0 22-12 22-32 0 0 0-29 0-67 0 0 0 0 0 0z m224 99c44-43 71-97 71-158 0-61-27-115-72-158l-20 22c38 36 63 83 63 136 0 52-24 100-63 136z m-57-44c35-30 55-69 55-114 0-44-21-84-54-114l-19 23c28 23 46 55 46 91 0 36-19 69-47 93z m-53-47c22-16 36-40 36-67 0-27-14-52-37-68l-15 25c14 11 24 26 24 43 0 19-6 36-22 46z"></path>
		    </symbol>
		  
		    <symbol id="olymp-music-video-settings-icon" viewBox="0 0 512 512">
		      <path d="m32 512l64 0 0-256-64 0z m64-512l-64 0 0 64 64 0z m-96 192l128 0 0-64-128 0z m480-192l-64 0 0 64 64 0z m-64 512l64 0 0-256-64 0z m-32-384l0 64 128 0 0-64z m-96-128l-64 0 0 256 64 0z m-64 512l64 0 0-64-64 0z m-32-128l128 0 0-64-128 0z"></path>
		    </symbol>
		  
		</svg>
		  
		  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		  
		    <symbol id="olymp-weather-cloudy-icon" viewBox="0 0 512 512">
		      <path d="m248 384l31 0 0 31-31 0z m123-110c0-46-40-84-90-85-24-28-60-45-102-45-69 0-125 49-129 111-30 14-50 42-50 75 0 47 41 85 93 85l124 0 0-31-124 0c-34 0-62-24-62-54 0-19 12-38 32-47l17-8 1-18c3-46 46-82 98-82 31 0 60 12 79 34l8 11 14 0c34 1 60 24 60 54l0 21 20 8c18 6 29 22 29 38 0 36-27 43-49 43l-30 0 0 31 30 0c44 0 80-24 80-74 0-30-20-56-49-67z m91-66c-4-62-60-111-129-111-42 0-78 18-102 45-18 1-36 6-50 15 15 1 36 5 57 16l8 0 8-10c19-22 48-35 79-35 52 0 95 36 98 83l1 18 17 7c20 10 32 28 32 48 0 29-28 53-62 53l-14 0c1 8 1 19-5 32l19 0c52 0 93-38 93-85 0-33-20-61-50-76z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-partly-sunny-icon" viewBox="0 0 512 512">
		      <path d="m256 444l32 0 0 32-32 0z m126-114c0-47-41-86-92-87-25-29-63-47-105-47-71 0-129 51-134 115-30 15-51 44-51 77 0 49 43 88 96 88l128 0 0-32-128 0c-35 0-64-25-64-56 0-20 13-38 33-48l17-8 1-19c3-48 48-85 102-85 32 0 61 13 81 36l9 10 14 1c34 1 61 25 61 55l0 22 21 8c18 7 30 23 30 40 0 36-27 44-51 44l-30 0 0 32 30 0c46 0 83-25 83-76 0-31-21-58-51-70z m-86-198c-53 0-98 34-114 82l33 5c13-32 44-55 81-55 49 0 88 39 88 88 0 22-8 42-21 57l5 7c0 0 6 13 11 22 23-21 37-52 37-86 0-66-54-120-120-120z m0-96c-9 0-16 7-16 16l0 48c0 9 7 16 16 16 9 0 16-7 16-16l0-48c0-9-7-16-16-16z m200 200l-48 0c-9 0-16 7-16 16 0 9 7 16 16 16l48 0c9 0 16-7 16-16 0-9-7-16-16-16z m-47-137c-7-6-17-6-23 0l-34 34c-6 6-6 17 0 23 6 6 17 6 23 0l34-34c6-6 6-16 0-23z m-283 0c-6-6-16-6-23 0-6 7-6 17 0 23l34 34c6 6 17 6 23 0 6-6 6-17 0-23z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-rain-drops-icon" viewBox="0 0 512 512">
		      <path d="m62 171c21 45 38 89 38 103 0 21-17 38-38 38-20 0-37-17-37-38 0-14 17-58 37-103m0-59c0 0-62 126-62 162 0 35 28 63 62 63 35 0 63-28 63-63 0-36-63-162-63-162z m388-40c20 47 37 91 37 104 0 20-17 36-37 36-21 0-38-16-38-36 0-13 17-57 38-104m0-60c0 0-63 130-63 164 0 34 28 61 63 61 34 0 62-27 62-61 0-34-62-164-62-164z m-175 242c31 62 62 135 62 158 0 35-28 63-62 63-35 0-63-28-63-63 0-23 32-96 63-158m0-54c0 0-87 164-87 212 0 48 39 88 87 88 48 0 87-40 87-88 0-48-87-212-87-212z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-rain-icon" viewBox="0 0 512 512">
		      <path d="m199 43l38 0 0 38-38 0z m-57 294l-29 0c-41 0-75-30-75-66 0-24 15-46 39-58l20-9 2-23c2-38 27-70 62-87l0-41c-56 20-96 68-100 126-36 17-61 52-61 92 0 57 51 104 113 104l29 0z m311-135c0-56-49-102-110-104-17-20-41-36-68-46l0 41c15 7 29 17 40 30l11 13 16 0c41 1 73 30 73 66l0 26 25 9c21 8 36 27 36 48 0 43-33 52-61 52l-36 0 0 38 36 0c55 0 97-29 97-90 0-37-23-70-59-83z m-175 80c-5 9-2 21 7 26 9 5 21 2 26-7 5-9 12-58 12-58 0 0-40 30-45 39z m-97 47c-5 9-2 21 7 26 9 5 21 2 26-7 5-9 12-59 12-59 0 0-39 31-45 40z m49 82c-5 9-2 20 7 25 9 6 21 3 26-6 5-10 12-59 12-59 0 0-39 31-45 40z m86-29c-6 9-3 21 7 26 9 5 20 2 25-7 6-9 12-59 12-59 0 0-39 31-44 40z m-182 59c-6 9-3 21 7 26 9 5 20 2 25-7 6-9 12-59 12-59 0 0-39 31-44 40z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-snow-icon" viewBox="0 0 512 512">
		      <path d="m199 28l38 0 0 38-38 0z m-57 294l-29 0c-41 0-75-29-75-65 0-24 15-46 39-58l20-10 2-22c2-38 27-70 62-87l0-42c-56 21-96 69-100 127-36 17-61 52-61 92 0 57 51 103 113 103l29 0z m311-135c0-56-49-101-110-103-17-21-41-37-68-46l0 41c15 7 29 17 40 30l11 12 16 1c41 1 73 30 73 65l0 27 25 9c21 8 36 27 36 47 0 43-33 52-61 52l-36 0 0 38 36 0c55 0 97-28 97-89 0-38-23-70-59-84z m-182 118l-11-11 24 0c6 0 10-4 10-10 0-5-4-9-10-9l-24 0 11-11c3-3 3-9 0-13-4-4-10-4-14 0l-10 11 0-25c0-5-5-9-10-9-5 0-9 4-9 9l0 25-11-11c-4-4-10-4-13 0-4 4-4 10 0 13l10 11-24 0c-6 0-10 4-10 9 0 6 4 10 10 10l24 0-10 11c-4 3-4 9 0 13 3 4 9 4 13 0l11-11 0 25c0 5 4 9 9 9 5 0 10-4 10-9l0-25 10 11c4 4 10 4 14 0 3-4 3-10 0-13z m81 76l-20 0 9-9c3-3 3-8 0-11-3-3-8-3-11 0l-9 9 0-21c0-4-4-8-8-8-4 0-8 4-8 8l0 21-9-9c-3-3-8-3-11 0-3 3-3 8 0 11l9 9-21 0c-4 0-8 3-8 8 0 4 4 8 8 8l21 0-9 9c-3 3-3 8 0 11 3 3 8 3 11 0l9-9 0 20c0 5 4 8 8 8 4 0 8-3 8-8l0-20 9 9c3 3 8 3 11 0 3-3 3-8 0-11l-9-9 20 0c5 0 8-4 8-8 0-5-3-8-8-8z m-132 47l-21 0 9-9c3-3 3-8 0-11-3-3-8-3-11 0l-9 9 0-20c0-5-3-8-8-8-4 0-8 3-8 8l0 20-9-9c-3-3-8-3-11 0-3 3-3 8 0 11l9 9-20 0c-5 0-8 4-8 8 0 5 3 8 8 8l20 0-9 9c-3 3-3 8 0 11 3 3 8 3 11 0l9-9 0 21c0 4 4 8 8 8 5 0 8-4 8-8l0-21 9 9c3 3 8 3 11 0 3-3 3-8 0-11l-9-9 21 0c4 0 8-3 8-8 0-4-4-8-8-8z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-storm-icon" viewBox="0 0 512 512">
		      <path d="m199 28l38 0 0 38-38 0z m-57 294l-29 0c-41 0-75-29-75-65 0-24 15-46 39-58l20-10 2-22c2-38 27-70 62-87l0-42c-56 21-96 69-100 127-36 17-61 52-61 92 0 57 51 103 113 103l29 0z m311-135c0-56-49-101-110-103-17-21-41-37-68-46l0 41c15 7 29 17 40 30l11 12 16 1c41 1 73 30 73 65l0 27 25 9c21 8 36 27 36 47 0 43-33 52-61 52l-36 0 0 38 36 0c55 0 97-28 97-89 0-38-23-70-59-84z m-148 96l-31 0 28-74-92 96 31 0-27 74z m48 87l-25 0 22-57-73 75 25 0-22 58z m-155-19l-73 75 25 0-22 58 73-76-25 0z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-strong-winds-icon" viewBox="0 0 512 512">
		      <path d="m451 308c-33 0-416 0-416 0l0 35 416 0c15 0 26 11 26 26 0 14-11 26-26 26-10 0-18-6-23-14 0 0 0 0 0 0l-31 16c11 19 31 33 54 33 34 0 61-28 61-61 0-34-27-61-61-61z m0-226c-23 0-43 14-54 33l31 16c0 0 0 0 0 0 5-8 13-14 23-14 15 0 26 12 26 26 0 15-11 26-26 26l-382 0 0 35c95 0 355 0 382 0 34 0 61-27 61-61 0-33-27-61-61-61z m-451 191l69 0 0-34-69 0z m104 0l35 0 0-34-35 0z m70-34l0 34 295 0 0-34z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-sunny-icon" viewBox="0 0 512 512">
		      <path d="m256 114c-58 0-108 35-130 85l43 0c18-28 50-47 87-47 58 0 104 46 104 104 0 58-46 104-104 104-37 0-69-19-87-47l-43 0c22 50 72 85 130 85 79 0 142-63 142-142 0-79-63-142-142-142z m-104 161l0-38-38 0 0 38z m104-180c10 0 19-9 19-19l0-57c0-11-9-19-19-19-10 0-19 8-19 19l0 57c0 10 9 19 19 19z m0 322c-10 0-19 9-19 19l0 57c0 11 9 19 19 19 10 0 19-8 19-19l0-57c0-10-9-19-19-19z m237-180l-57 0c-10 0-19 9-19 19 0 10 9 19 19 19l57 0c11 0 19-9 19-19 0-10-8-19-19-19z m-398 19c0-10-9-19-19-19l-57 0c-11 0-19 9-19 19 0 10 8 19 19 19l57 0c10 0 19-9 19-19z m302-114l40-40c7-8 7-20 0-27-7-7-19-7-27 0l-40 40c-7 8-7 20 0 27 7 7 19 7 27 0z m-282 228l-40 40c-7 8-7 20 0 27 7 7 19 7 27 0l40-40c7-8 7-20 0-27-7-7-19-7-27 0z m282 0c-8-7-20-7-27 0-7 7-7 19 0 27l40 40c8 7 20 7 27 0 7-7 7-19 0-27z m-282-228c8 7 20 7 27 0 7-7 7-19 0-27l-40-40c-8-7-20-7-27 0-7 7-7 19 0 27z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-thermometer-icon" viewBox="0 0 512 512">
		      <path d="m146 402c0 48 31 89 73 104l0-27c-28-13-48-43-48-77 0-38 25-71 61-81l0-26c-49 11-86 55-86 107z m134-107l0 26c36 10 61 43 61 81 0 34-20 64-48 77l0 27c42-15 73-56 73-104 0-52-37-96-86-107z m0-222l-24 0 0 25 24 0z m0 49l-24 0 0 24 24 0z m0 49l-24 0 0 24 24 0z m0 48l-24 0 0 25 24 0z m-36 293l24 0 0-24-24 0z m-12-197l0-266c0-14 11-25 24-25 14 0 25 11 25 25l0 266 24 0c0-114 0-266 0-266 0-27-22-49-49-49-27 0-49 22-49 49 0 0 0 152 0 266z"></path>
		    </symbol>
		  
		    <symbol id="olymp-weather-wind-icon-header" viewBox="0 0 512 512">
		      <path d="m436 289c-42 0-403 0-403 0l0 21 403 0c30 0 54 25 54 55 0 30-24 54-54 54-21 0-39-11-49-29 0-1 0-1 0-1l-19 11c13 24 38 41 68 41 42 0 76-34 76-76 0-42-34-76-76-76z m0-218c-30 0-55 17-68 41l19 11c0 0 0 0 0-1 10-18 28-29 49-29 30 0 54 24 54 54 0 30-24 55-54 55l-360 0 0 21c98 0 327 0 360 0 42 0 76-34 76-76 0-42-34-76-76-76z m-283 196l21 0 0-22-21 0z m43-22l0 22 207 0 0-22z m-196 22l131 0 0-22-131 0z"></path>
		    </symbol>
		  
		</svg>
		
		  
		</div>
		<!-- /SVG icons loader -->
	</div>

@endsection

@section('head')
    <link rel="stylesheet" href="/styles/users.css" />
    <style>
    	.container-fluid{
    		width: 100%;
    	}
    	
    </style>
@endsection


@section('scripts')
	<script>
		document.querySelector(".wall-post-add-photo").addEventListener("click", function(e){
			e.preventDefault();
			this.previousElementSibling.click();
		});
		
		document.querySelector("#newsfeed-items-grid form").addEventListener("submit", function(e){
			e.preventDefault();
			var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.getAttribute("action"));
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                }
                else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
            };
            xhr.send(formData); 
		});
	</script>
@endsection



