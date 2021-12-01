@extends('public')

@section('title')
    UniTech Manutenções
@endsection

@section('img-intro')
    <img src="{{ asset('/img/intro-img.svg') }}" alt="" class="img-fluid">
@endsection

@section('intro')
    <h2>A melhor<br><span>manutenção</span><br>a todo momento para você!</h2>
    <div>
        <a href="#about" class="btn-get-started scrollto">Veja Mais</a>
        <a href="#services" class="btn-services scrollto">Nossos Serviços</a>
    </div>
@endsection

@section('content')
    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>Sobre Nós</h3>
                <p>Agilidade. Qualidade. Confiança.</p>
            </header>

            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">
                    <p>
                        Somos uma empresa que nasceu para resolver da forma mais ágil os problemas com os equipamentos
                        eletrônicos da sua empresa ou escritório. Ofereçemos diferentes serviços com os mais diversos
                        profissionais qualificados para te oferecer o melhor resultado.
                    </p>

                    <div class="icon-box wow fadeInUp">
                        <div class="icon"><i class="fas fa-running"></i></div>
                        <h4 class="title"><a href="">Agilidade</a></h4>
                        <p class="description">
                            Oferecemos ténicos especializados em menos de 24h para situações emergenciais em menos de
                            3 dias para situações corriqueiras.
                        </p>
                    </div>

                    <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon"><i class="fas fa-check"></i></div>
                        <h4 class="title"><a href="">Qualidade</a></h4>
                        <p class="description">
                            Nosso time é perfeitamente treinado para resolver qualquer problema que tenha com seus
                            equipamentos. Todos certificados e aptos para a execução.
                        </p>
                    </div>

                    <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon"><i class="fa fa-bar-chart"></i></div>
                        <h4 class="title"><a href="">Confiança</a></h4>
                        <p class="description">
                            Confiamos em nosso trabalho e queremos que confie em nós também. Para isso, possuímos uma
                            política de reembolso total em caso de qualquer erro por parte do nosso time que traga
                            prejuizo comprado ao seu negócio.
                        </p>
                    </div>

                </div>

                <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
                    <img src="{{ asset('/img/about-img.svg') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row about-extra">
                <div class="col-lg-6 wow fadeInUp">
                    <img src="{{ asset('img/about-extra-1.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
                    <h4>Conheça a nossa mais nova novidade: atendimento remoto!</h4>
                    <p>
                        Sabemos o quanto pode ser incomodo ter que aguardar um técnico para resolver um problema de
                        software ou algo desta natureza. Pensando nisso oferecemos nossos serviços à distância, para
                        solucionar problemas não-fisicos de maneira ainda mais rápida, nossos técnicos te atenderão em
                        menos de 2 horas!
                    </p>
                    <p>
                        Este serviço não está disponível para todos os problemas que você possa ter. Todavia,
                        recomendamos que entre em contato conosco e te recomendaremos o melhor tipo de atendimento entre
                        o presencial e o online!
                    </p>
                </div>
            </div>

            <div class="row about-extra">
                <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                    <img src="{{ asset('img/about-extra-2.svg') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
                    <h4>Proteja seus dados. Eles são o coração da sua empresa!</h4>
                    <p>
                        Os dispositivos e programas podem parar a qualquer momento, você nunca sabe quando isso
                        acontecerá, por isso é importante manter o backup sempre em dia. ENtendemos a importância de
                        garantir a integridade de todos os dados, como por exemplo: banco de dados, arquivos de usuário,
                        etc.
                    </p>
                    <p>
                        Evite maiores complicações e gastos no futuro realizando backups e assegurando que os dados
                        estarão sempre em segurança. Conte com a gente para estruturar todo o sistema de backup e
                        proteção de dados da sua empresa!
                    </p>
                </div>

            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3>Serviços</h3>
                <p>Conheça um poco mais do que podemos oferecer para você.</p>
            </header>

            <div class="row">

                <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="">Ánalise de Performance</a></h4>
                        <p class="description">Ánalisamos todos os equipamentos no ambiente e entregamos um relatório de
                            erros, equipamentos comprometidos, aprimoramentos recomendados, etc.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
                        <h4 class="title"><a href="">Backups e Proteção</a></h4>
                        <p class="description">
                            Desenvolvemos um sistema de backup com base nas necessidades da empresa e de seus dados.
                            Além disso, verificamos e corrigmos possíveis falhas de proteção de dados.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s"
                     data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                        <h4 class="title"><a href="">Criação de Logs</a></h4>
                        <p class="description">
                            Criamos logs para os mais variados sistemas. Logs facilitam a busca por erros e eventuais
                            rastreios. Além de ser extremamente importantes para desenvolvedores.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
                        <h4 class="title"><a href="">Boost de Velocidade</a></h4>
                        <p class="description">
                            Máquinas lentas e cheia de erros não mais serão um problema depois do nosso boost de
                            performance para computadores mais antigos que apresentam lentidão exagerada.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
                        <h4 class="title"><a href="">Atendimento Remoto</a></h4>
                        <p class="description">
                            Não importa onde sua empresa está instalada fisicamente, nosso suporte online está pronto
                            para te atender e resolver todos os problemas possíveis de serem resolvidos à distância.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-clock-outline" style="color: #4680ff;"></i></div>
                        <h4 class="title"><a href="">Atendimento Emergencial</a></h4>
                        <p class="description">
                            Surgiu um contratempo emergencial em seu equipamento? Oferecemos suporte presencial em até
                            24 horas e suporte online em até 2 horas para que você não fique na mão.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #services -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
        <div class="container-fluid">

            <div class="section-header">
                <h3>Fale Conosco</h3>
            </div>

            <div class="row wow fadeInUp">

                <div class="col-lg-6">
                    <div class="map mb-4 mb-lg-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1490243203634!2d-46.65635468538381!3d-23.563090667540468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8f25781dd%3A0xb4e16fad06821193!2sAv.%20Paulista%2C%201300%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001310-100%2C%20Brasil!5e0!3m2!1spt-BR!2sbg!4v1618427506789!5m2!1spt-BR!2sbg"
                            width="100%" height="312" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-4 info">
                            <i class="ion-ios-location-outline"></i>
                            <p>Av. Paulista, 1300</p>
                        </div>
                        <div class="col-md-4 info">
                            <i class="ion-ios-email-outline"></i>
                            <p>contato@unitech.com.br</p>
                        </div>
                        <div class="col-md-4 info">
                            <i class="ion-ios-telephone-outline"></i>
                            <p>+55 11 98888-7777</p>
                        </div>
                    </div>

                    <div class="form">
                        @if(!empty($mensagem))
                        <div class="alert alert-success">{{$mensagem}}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/mail" method="post" role="form" class="contactForm">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome"
                                            />

                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                           />

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Assunto"  />

                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem"
                                          style="resize: none"></textarea>

                            </div>
                            <div class="text-center"><button type="submit" title="Send Message">Enviar Mensagem</button></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->
@endsection
