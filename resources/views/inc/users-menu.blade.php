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
										<a href="/users/{{ $user->nickname }}" class="active">Линия жизни</a>
									</li>
									<li>
										<a href="#">Мой гороскоп</a>
									</li>
									@if(isset($currentUser) && $currentUser->id == $user->id)
									<li>
										<a href="{{ route('favourite') }}">Мои Эксперты</a>
									</li>
									@endif
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="/users/{{ $user->nickname }}/photos">Фото</a>
									</li>
									<li>
										<a href="/users/{{ $user->nickname }}/videos">Видео</a>
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
							<a href="#" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="/profile/messages" class="btn btn-control bg-purple">
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
										<a href="#">Настройки аккаунта</a>
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
							<a href="/users/{{ $user->nickname }}" class="h4 author-name">{{ $user->namef() }}</a>
							<!--<div class="country">Санкт-Петербург, РФ</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>