<template>
  <footer class="footer pt-5">
    <div class="container-fluid px-6">
      <div class="row py-3 py-md-5">
        <div class="col-md-4 ps-md-0 pe-md-5 footer-margin">
          <Link class="d-block mb-4" :href="route('home')">
            <img
              v-if="
                $page.props &&
                $page.props.settings &&
                $page.props.settings.dark_logo
              "
              width="301"
              :src="$page.props.settings.dark_logo"
              alt="logo"
            />
            <!-- <img  src="@/images/icons/footerlogo.png" width="200" alt="logo"> -->
            <span v-else class="mt-4">
              {{
                $page.props &&
                $page.props.settings &&
                $page.props.settings.site_title
                  ? $page.props.settings.site_title
                  : __("doctor consultant")
              }}
            </span>
          </Link>
          <div
            v-if="
              getPageContentType('footer_section_description') == 'textarea'
            "
          >
            <div
              class="lh-lg fs-3 text-start"
              v-html="getPageContent('footer_section_description')"
            ></div>
          </div>
          <div
            v-else-if="
              getPageContentType('footer_section_description') == 'text'
            "
          >
            <p>{{ getPageContent("footer_section_description") ?? "-" }}</p>
          </div>
          <div v-else>
            <p>{{ __("footer_tagline_1") }}</p>
          </div>
        </div>
        <div class="col-md-7 ms-md-4">
          <div class="row mt-3 mt-md-0">
            <div class="col-md-3 p-md-0 col-sm-6">
              <div class="widget">
                <h4 class="fw-bold mb-3 ps-3">{{ __("Company") }}</h4>
                <ul>
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link class="nav-link fs-3 mb-2" :href="route('home')">{{
                      __("Home")
                    }}</Link>
                  </li>
                  <li v-if="$page.props.auth == null">
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <!-- <Link class="nav-link fs-3 mb-2"
                          :href="route('company_pages.display', { slug: 'about' })"> {{ __('About') }}</Link>
                      </li> -->
                    <Link class="nav-link fs-3 mb-2" :href="route('login')">
                      {{ __("login") }}</Link
                    >
                  </li>
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('events.listing')"
                      >{{ __("Events Calendar") }}
                    </Link>
                  </li>
                  <!-- <li>
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('our-story')"
                      >{{ __("our success stories") }}</Link
                    >
                  </li> -->
                  <li>
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('services.listing')"
                      >{{ __("services") }}
                    </Link>
                  </li>
                  <li v-if="$page.props.auth == !null">
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('appointment_log')"
                      >{{ __("Medical Appointments") }}
                    </Link>
                  </li>
                  <!-- <li>

                        <Link class="nav-link fs-3 mb-2" :href="route('clinics.listing')">
                        {{ __("Clinics") }}</Link>
                      </li>
                      <li>

                        <Link class="nav-link fs-3 mb-2" :href="route('doctors.listing')">
                        {{ __("Doctors") }}</Link>
                      </li>
                      <li>

                        <Link class="nav-link fs-3 mb-2" :href="route('archives.listing')">
                        {{ __("Courses") }}</Link>
                      </li> -->
                </ul>
              </div>
            </div>
            <div class="col-md-3 mt-md-4 col-sm-6">
              <div class="widget">
                <h4 class="fw-bold mb-3 ps-3"></h4>
                <ul>
                  <li>
                    <Link class="nav-link fs-3 mb-2" :href="route('about')">
                      {{ __("about") }}
                    </Link>
                  </li>
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('company_pages.display', { slug: 'terms' })"
                      >{{ __("Terms of Use") }}</Link
                    >
                  </li>
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="
                        route('company_pages.display', { slug: 'privacy' })
                      "
                      >{{ __("Privacy Policy") }}
                    </Link>
                  </li>
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="
                        route('company_pages.display', { slug: 'cookies' })
                      "
                      >{{ __("Cookies Policy") }}
                    </Link>
                  </li>
                  <!-- <li>

                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="
                        route('company_pages.display', { slug: 'disclaimer' })
                      "
                      >{{ __("Disclaimer") }}</Link
                    >
                  </li> -->
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="widget">
                <h4 class="fw-bold mb-3 ps-3">{{ __("Resources") }}</h4>
                <ul>
                  <!-- <li>

                        <Link :href="route('doctors.listing')" class="nav-link fs-3 mb-2">
                        {{ __n('Doctor') }}</Link>
                      </li> -->
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('doctors.listing')"
                      >{{ __("doctors") }}</Link
                    >
                  </li>
                  <!-- <li>

                    <Link
                      class="nav-link fs-3 mb-2"
                      v-if="
                        $page.props.auth &&
                        hasRole('doctor') &&
                        $page.props.auth.logged_in_as == 'doctor'
                      "
                      :href="route('pricing', { type: 'doctor' })"
                      >{{ __("pricing plan") }}</Link
                    >
                    <Link
                      class="nav-link fs-3 mb-2"
                      v-else-if="
                        $page.props.auth &&
                        hasRole('clinic') &&
                        $page.props.auth.logged_in_as == 'clinic'
                      "
                      :href="route('pricing', { type: 'clinic' })"
                      >{{ __("pricing plan") }}</Link
                    >
                    <Link
                      class="nav-link fs-3 mb-2"
                      v-else
                      :href="route('pricing', { type: 'doctor' })"
                    >
                      {{ __("Pricing Plan") }}</Link
                    >
                  </li> -->
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link
                      class="nav-link fs-3 mb-2"
                      :href="route('clinics.listing')"
                      >{{ __("clinics") }}</Link
                    >
                  </li>
                  <li>
                    <!-- <img src="@/images/common/bullter-1.png" alt="icon"> -->
                    <Link class="nav-link fs-3 mb-2" :href="route('faqs')">{{
                      __("FAQ")
                    }}</Link>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="widget ms-2">
                <h4 class="fw-bold mb-3 ps-3 ps-md-0" style="width: 212px">
                  {{ __("Connect with us") }}
                </h4>
                <ul class="d-flex flex-column ps-0 mb-0 social-contact-icons">
                  <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_facebook_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_facebook_link"
                      ><i class="bi bi-facebook me-3"></i
                      ><span class="fs-3">Facebook</span></a
                    >
                  </li>
                  <!-- <li v-if="$page.props.settings.web_youtube_link"><a target="_blank"
                    :href="$page.props.settings.web_youtube_link"><i class="bi bi-youtube"></i></a></li> -->
                  <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_twitter_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_twitter_link"
                      ><i class="bi bi-twitter me-3"></i
                      ><span class="fs-3">Twitter</span></a
                    >
                  </li>
                  <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_linkedin_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_linkedin_link"
                      ><i class="bi bi-linkedin me-3"></i
                      ><span class="fs-3">Linkedin</span></a
                    >
                  </li>
                  <!-- <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_whatsapp_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_whatsapp_link"
                      ><i class="bi bi-whatsapp me-3"></i
                      ><span class="fs-3">Whatsapp</span></a
                    >
                  </li> -->
                  <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_instagram_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_instagram_link"
                      ><i class="bi bi-instagram me-3"></i
                      ><span class="fs-3">Instagram</span></a
                    >
                  </li>

                  <!-- <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_tiktok_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_tiktok_link"
                      ><i class="bi bi-tiktok me-3"></i
                      ><span class="fs-3">Tiktok</span></a
                    >
                  </li> -->
                  <!-- <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_snapchat_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_snapchat_link"
                      ><i class="bi bi-snapchat me-3"></i
                      ><span class="fs-3">Snapchat</span></a
                    >
                  </li> -->
                  <!-- <li
                    class="d-flex mb-2 ps-3 ps-md-0"
                    v-if="$page.props.settings.web_pinterest_link"
                  >
                    <a
                      class="text-decoration-none text-white"
                      target="_blank"
                      :href="$page.props.settings.web_pinterest_link"
                      ><i class="bi bi-pinterest me-3"></i
                      ><span class="fs-3">Pinterest</span></a
                    >
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-3 mt-5 mb-lg-0">
          <div
            class="d-flex flex-column flex-md-row ms-md-5 ms-3 justify-content-md-between align-items-md-center align-items-start"
          >
            <Link
              class="btn btn-secondary fs-3 mb-3 mb-md-0 rounded-3 fw-semibold d-flex align-items-center btn-sup"
              style="justify-content: space-around"
              :href="route('contact')"
            >
              {{ __("Support")
              }}<img
                class="ms-3"
                style="width: 36px"
                src="@/images/icons/support.png"
            /></Link>
            <span class="fs-3 fw-regular mb-0 me-5"
              >© {{ new Date().getFullYear() }} {{ __("copyright") }}
              <Link
                class="text-white text-decoration-none"
                :href="route('home')"
              >
                {{
                  $page.props &&
                  $page.props.settings &&
                  $page.props.settings.site_title
                    ? $page.props.settings.site_title
                    : __(" Doctor - hub")
                }}
              </Link>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- <ul>
                      <li>

                        <Link class="nav-link fs-3 mb-2 fw-semibold" :href="route('broadcasts.listing')">{{ __("Media") }}</Link>
                      </li>
                      <li>

                        <Link class="nav-link fs-3 mb-2 fw-semibold"
                          :href="route('blogs.listing')">{{ __('Blogs') }}</Link>
                      </li>
                      <li>

                        <Link class="nav-link fs-3 mb-2 fw-semibold" :href="route('archives.listing')">{{ __("Courses")
                        }}
                        </Link>
                      </li>

                      <li>

                        <Link class="nav-link fs-3 mb-2 fw-semibold" :href="route('podcasts.listing')">
                        {{ __("Podcast") }}</Link>
                      </li>
                      <li>

                        <Link class="nav-link fs-3 mb-2 fw-semibold" :href="route('contact')">
                        {{ __("Contact") }}</Link>
                      </li>
                      <li>

                        <Link class="nav-link fs-3 mb-2 fw-semibold" :href="route('company_pages.display', { slug: 'support-27' })">
                        {{ __("Support") }}</Link>
                      </li>
                    </ul> -->

    <!-- <div class="row mb-4 align-items-center">
            <div class="col-md-12">
              <h4 class="mb-0 text-white">{{__("crisis support")}}</h4>
              <div class="d-flex align-items-center">
                <p class="text-white mb-0" ><b> {{ __('dont use this site if')}}:</b> {{ __('crisis_support_statement') }}. <Link :href="route('company_pages.display',{slug:'crisis-support'})">{{ __('use these resources') }} </Link></p>
                <Link :href="route('company_pages.display',{slug:'support'})" class="btn btn-sm ms-3 btn-primary">
                  {{('support')}} <i class="bi bi-headset"></i>
                </Link>
              </div>

            </div>

          </div> -->
    <div class="pb-4">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-6">

            <div class="d-flex justify-content-center justify-content-lg-end">

            </div>
          </div> -->
        </div>
      </div>
    </div>
  </footer>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

