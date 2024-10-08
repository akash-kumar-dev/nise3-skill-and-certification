@php
    /** @var \App\Models\Institute $currentInstitute */
    $currentInstitute = app('currentInstitute');
@endphp


<?php
    $descriptions = $siteSettingInfo->site_description ? $siteSettingInfo->site_description : '';
    $site_email = $siteSettingInfo->site_email ? $siteSettingInfo->site_email : '';
    $site_mobile = $siteSettingInfo->site_mobile ? $siteSettingInfo->site_mobile : '';
    $site_address = $siteSettingInfo->site_address ? $siteSettingInfo->site_address : '';
?>

<section class="main-footer p-3" style="background-color: #4F5052;">
    <div class="container-fluid">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-sm-center col-sm-12 col-md-12">
            <!--footer widget one-->
            {{-- <div class="col-md-4 col-sm-6 footer-item">
                <div class="footer-widget">
                    <p>
                        {{  $currentInstitute && !empty($currentInstitute->description) ? $currentInstitute->description : $descriptions }}
                    </p>
                    <span>
                            <a href="{{route('frontend.static-content.show',[ 'page_id' => 'aboutus', 'instituteSlug' => $currentInstitute->slug ?? ''])}}"
                               class="read-more"> <i
                                    class="fas fa-angle-double-right"></i> {{strtoupper(__('generic.details'))}} </a>
                        </span>
                </div>
            </div> --}}
            <!--/ footer widget one-->


            <!--footer widget one-->
            <div class="col-md-6 d-none d-md-block footer-item mt-xl-3 mt-lg-5">
                <div class="footer-widget">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12" style="width: auto">
                                <div class="float-left">
                                    <h3 class="text-white">{{ __('generic.planning_and_implementation') }}</h3>
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('/assets/logo/planner-logo.png') }}" alt="A2i Logo" style="width: auto"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ footer widget one-->

            <div class="conatiner mt-sm-5 mt-xs-5 col-lg-5 col-sm-12 mt-xl-0 d-flex">

                <!--footer widget Two-->
                <div class="col-md-6 col-sm-6 footer-item d-flex align-items-end flex-column">
                    <div class="footer-widget-address">
                        <h3 class="mb-3 text-white">{{ __('generic.contact') }}</h3>
                        <p class="text-white">
                            <i class="fa fa-home text-white d-none d-sm-block" aria-hidden="true"></i>
                            {{ $currentInstitute && !empty($currentInstitute->address) ? $currentInstitute->address : $site_address }}
                        </p>

                        <p>
                            <i class="fa fa-envelope text-white d-none d-sm-block" aria-hidden="true"></i>
                            <a class="footer-email text-white"
                                href="mailto:{{ $currentInstitute && !empty($currentInstitute->email) ? $currentInstitute->email : $site_email }}">
                                {{ $currentInstitute && !empty($currentInstitute->email) ? $currentInstitute->email : $site_email }}
                            </a>
                        </p>
                        <p>
                            <i class="fas fa-mobile text-white d-none d-sm-block"></i>
                            &nbsp
                            <a class="text-white"
                                href="tel:{{ $currentInstitute && !empty($currentInstitute->mobile) ? $currentInstitute->mobile : $site_mobile }}">
                                {{ $currentInstitute && !empty($currentInstitute->mobile) ? $currentInstitute->mobile : $site_mobile }}
                            </a>
                        </p>

                    </div>
                </div>
                <!--/ footer widget Two-->

                <!--footer widget Three-->
                <div class="col-md-6 pl-md-5 ml-md-4 col-sm-6 footer-item">
                    <div class="footer-widget-quick-links">
                        <h3 class="mb-3 text-white">{{ __('generic.important_link') }} </h3>
                        <ul>

                            {{-- <li><i class="fa fa-angle-right"></i><a href="{{url('/')}}#running_courses">{{__('generic.online_course')}}</a></li> --}}
                            <li class="text-nowrap">
                                {{-- <i class="fa fa-angle-right text-white d-none d-sm-block"></i> --}}
                                <a class="text-white"
                                    href="{{ route('frontend.course_search', ['instituteSlug' => $currentInstitute->slug ?? '']) }}">
                                    {{ __('generic.online_course') }}
                                </a>
                            </li>

                            {{-- <li><i class="fa fa-angle-right"></i> <a href="{{route('frontend.static-content.show', ['page_id' => 'aboutus', 'instituteSlug' => $currentInstitute->slug ?? ''])}}">{{__('generic.about_us')}}</a></li>
                                <li><i class="fa  fa-angle-right"></i> <a href="{{route('frontend.static-content.show', ['page_id' => 'termsandconditions', 'instituteSlug' => $currentInstitute->slug ?? ''])}}">{{__('generic.terms_and_conditions')}}</a></li>
                                <li><i class="fa  fa-angle-right"></i> <a href="{{route('frontend.static-content.show', ['page_id' => 'privacypolicy', 'instituteSlug' => $currentInstitute->slug ?? ''])}}">{{__('generic.privacy_policy')}}</a></li>
                                <li><i class="fa  fa-angle-right"></i> <a href="{{route('frontend.static-content.show', ['page_id' => 'news', 'instituteSlug' => $currentInstitute->slug ?? ''])}}">{{__('generic.news')}} </a></li>
                             --}}

                            @foreach ($staticPageFooter as $key => $item)
                                @if ($currentInstitute)
                                    @if ($currentInstitute->id == $item->institute_id)
                                        <li>
                                            {{-- <i class="fa fa-angle-right text-white d-none d-sm-block"></i> --}}
                                            <a class="text-white"
                                                href="{{ route('frontend.static-content.show', ['page_id' => $item->page_id, 'instituteSlug' => $currentInstitute->slug]) }}">
                                                {{ $item->title }}</a>
                                        </li>
                                    @endif
                                @else
                                    @if (!$item->institute_id)
                                        <li>
                                            {{-- <i class="fa fa-angle-right text-white d-none d-sm-block"></i> --}}
                                            <a class="text-white"
                                                href="{{ route('frontend.static-content.show', ['page_id' => $item->page_id, 'instituteSlug' => '']) }}">
                                                {{ $item->title }}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach

                            @if ($currentInstitute)
                                {{-- <li><i class="fa  fa-angle-right"></i> <a href="{{url($currentInstitute->slug)}}#event_area">{{__('generic.events')}}</a></li> --}}


                                <li>
                                    {{-- <i class="fa fa-angle-right text-white d-none d-sm-block"></i> --}}
                                    <a class="text-white"
                                        href="{{ route('frontend.advice-page', ['instituteSlug' => $currentInstitute->slug ?? '']) }}">{{ __('generic.feedback') }}
                                    </a>
                                </li>
                                <li>
                                    {{-- <i class="fa fa-angle-right text-white d-none d-sm-block"></i> --}}
                                    <a class="text-white"
                                        href="{{ route('frontend.contact-us-page', ['instituteSlug' => $currentInstitute->slug ?? '']) }}">{{ __('generic.contact') }}
                                    </a>
                                </li>
                            @endif


                            <li>
                                {{-- <i class="fa fa-angle-right text-white"></i> --}}
                                <a class="text-white"
                                    href="{{ route('frontend.general-ask-page', ['instituteSlug' => $currentInstitute->slug ?? '']) }}">{{ __('generic.faq') }}
                                </a>
                            </li>

                            @guest
                                {{-- <li><i class="fa  fa-angle-right"></i> <a
                                    href="{{route('admin.login-form')}}">{{__('generic.login')}}</a></li>
                            <li><i class="fa  fa-angle-right"></i> <a href="#">{{__('generic.sign_up')}}</a></li> --}}

                                @if (!auth()->guard('web')->check())
                                    {{-- <a class="btn dropdown-item {{ request()->is('ssp-registration') ? 'active' : '' }}"
                                   href="{{ route('frontend.ssp-registration') }}"
                                   id="bd-versions" aria-haspopup="true">
                                    <i class="fa fa-file"> </i>&nbsp; {{__('generic.ssp_registration')}}
                                </a> --}}

                                    <li>
                                        {{-- <i class="fa fa-angle-right text-white"></i> --}}
                                        <a class="text-white"
                                            href="{{ route('frontend.ssp-registration') }}">{{ __('generic.ssp_registration') }}
                                        </a>
                                    </li>
                                @endif
                            @endguest

                        </ul>
                        </p>

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>

{{-- <footer class="footer-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" style="width: auto">
                <div class="float-left">
                    <h3>{{__('generic.planning_and_implementation')}}</h3>
                    <a href="#" target="_blank">
                        <img src="{{asset('/assets/logo/planner-logo.png')}}" alt="A2i Logo"></a>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
<!--------Back to top HTML-------->
<!-- Scroll to Top -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
    <i class="fas fa-chevron-up"></i>
</a>
<!-- Color Changer -->
