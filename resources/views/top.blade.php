<!DOCTYPE html>
<html lang="ja">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	@isset($title)
	<title>{{ $title }} </title>
	@else
	<title>トップページ</title>
	@endisset

	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
	<!-- Bootstrap icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

</head>

<!-- Navigation-->
<nav class="navbar navbar-light bg-light static-top">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">トップ</a>
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
	</div>
</nav>


<!-- Masthead-->
<header class="masthead">
	<div class="container position-relative">
		<div class="row justify-content-center">
			<div class="col-xl-6">
				<div class="text-center text-white">
					<!-- Page heading-->
					<h1 class="mb-5">エンジニアの勉強記録 & <br>マッチングアプリ</h1>
					<!-- Signup form-->
					<!-- * * * * * * * * * * * * * * *-->
					<!-- * * SB Forms Contact Form * *-->
					<!-- * * * * * * * * * * * * * * *-->
					<!-- This form is pre-integrated with SB Forms.-->
					<!-- To make this form functional, sign up at-->
					<!-- https://startbootstrap.com/solution/contact-forms-->
					<!-- to get an API token!-->
					<form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">

						<!-- Email address input-->
						{{-- <div class="row">
							<div class="col">
								<input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
								<div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
								<div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
							</div>
							<div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
						</div> --}}
						<!-- Submit success message-->
						<!---->
						<!-- This is what your users will see when the form-->
						<!-- has successfully submitted-->
						<div class="d-none" id="submitSuccessMessage">
							<div class="text-center mb-3">
								<div class="fw-bolder"></p>
								<a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
							</div>
						</div>
						<!-- Submit error message-->
						<!---->
						<!-- This is what your users will see when there is-->
						<!-- an error submitting the form-->
						<div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</header>


<!-- Testimonials-->
<section class="testimonials text-center bg-light">
    <div class="container">
        <h2 class="mb-5">このアプリで出来ること</h2>
    
        {{-- ユーザー --}}
        <div class="row">
            <h3>ユーザー側</h3>
            <div class="col-lg-4 mt-5 mb-8">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                    <h5>勉強記録の視覚化</h5>
                    <br>
                    <p class="font-weight-light mb-0">言語別の学習状況の表示と<br>勉強時間記録の<strong>グラフ化</strong>により、<br>自分の学習状況を視覚化することで<br><strong>モチベーションの維持</strong>に繋がる。</p>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mb-8">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                    <h5>コミュニティを築く</h5>
                    <br>
                    <p class="font-weight-light mb-0"> ユーザー間での <strong>チャット機能</strong>、 <br>
                        <strong>グループチャット</strong>により<br>
                        自分と同じレベル、学習言語を学ぶ <br>
                        ユーザー同士で繋がり、<br>知識やアイデアを交わし合える <br><strong>新しいつながり</strong>を築くことができる。</p>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mb-8">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                    <h5>企業とユーザーのマッチング</h5>
                    <br>
                    <p class="font-weight-light mb-0">
                        企業側からのオファーにより<br>自身に興味をもつ企業の<br><strong>傾向の把握</strong>ができ、<br>今まで気づかなかった<br>自分の<strong>可能性</strong>や新たな
                        <strong>選択肢</strong>を広げることができる。
                </p>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br><br><br>
    {{-- 企業 --}}
    <div class="row ">
        <h3>企業側</h3>
        <div class="col-lg-4 mt-5 mb-8">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                <h5>採用活動の効率化</h5>
                <br>
                <p class="font-weight-light mb-0"><strong>ユーザー検索機能</strong>により、
                    <br>自社が求める最適な人材を探すための
                    <br>採用活動を効率的に行える。
                </p>
            </div>

        </div>
        <div class="col-lg-4 mt-5 mb-8">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                <h5>新たなエンジニア人材の確保</h5>
                <br>
                <p class="font-weight-light mb-0">ユーザーの <strong>勉強記録情報</strong>や<br>
                    <strong>ポートフォリオの</strong>の閲覧により<br>
                    やる気や技術力の判別が事前にでき、<br>採用後のミスマッチを防げる。</p>
            </div>
        </div>

        <div class="col-lg-4 mt-5 mb-8">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                <h5>認知度の向上</h5>
<br>
                <p class="font-weight-light mb-0"><strong>スカウト機能</strong>で<br>自社が求める人材に対して<br>直接アプローチをかけることができ、
                   <br>企業を<strong>知ってもらう</strong><br>きっかけを作ることができる。</p>
            </div>
        </div>
    </div>
</div>
</section>

      <!-- Call to Action-->
      <section class="call-to-action text-white text-center" id="signup">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
        
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                </div>
                {{-- <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div> --}}
                    <!-- Signup form-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    {{-- <form class="form-subscribe" id="contactFormFooter" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="emailAddressBelow" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:required">Email Address is required.</div>
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">Email Address Email is not valid.</div>
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </div> --}}
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        {{-- <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                <p>To activate this form, sign up at</p>
                                <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div> --}}
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        {{-- <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </section>




<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>
</html>

