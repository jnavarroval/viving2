<template>
  <section>
    <nav
      class="navbar navbar-expand-lg"
      style="background-color: #F6F6F9"
      :class="{
        'shadow-sm': !view.topOfPage,
      }"
    >
      <div class="container px-md-0 nav-bar">
        <button
          class="btn btn-secondary rounded-4 d-block d-md-none"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bi bi-list text-white fs-1"></i>
        </button>
        <div
          class="collapse navbar-collapse bg-prim py-sm-3 py-md-0"
          id="navbarSupportedContent"
          style="flex-grow: inherit"
        >
          <ul class="navbar-nav py-3 py-md-0">
            <li class="nav-item" :class="{ active: route().current('home') }">
              <Link class="nav-link" :href="route('home')">
                {{ __("Home") }}
              </Link>
            </li>
            <!-- <li class="nav-item">
              <Link class="nav-link" :href="route('company_pages.display', { slug: 'about' })">
              {{ __("About") }}
              </Link>
            </li> -->
            <li class="nav-item">
              <div
                class="dropdown department"
                @mouseenter="showDropdown('department')"
                @mouseleave="hideDropdown('department')"
              >
                <Link class="nav-link dropdown-toggle" :href="route('categories')">
                  {{ __("departments") }}
                </Link>
                <!-- <ul class="dropdown-menu" v-if="fetching">
                  <div class="container">
                  <div class="row align-items-center">
                  <div class="col-md-2 col-6">
                      <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                      <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                      <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                      <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                      <categories-skeleton></categories-skeleton>
                  </div>
                  <div class="col-md-2 col-6">
                      <categories-skeleton></categories-skeleton>
                  </div>
                  </div>
              </div>
                </ul> -->

                <ul
                  class="dropdown-menu dropdown-menu-center"
                  :class="{ show: dropdowns.department }"
                >
                  <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <Link
                      :href="route('categories')"
                      class="text-decoration-none text-primary fs-3 fw-normal"
                      >{{ __("view all") }}</Link
                    >
                        </div>
                      <div
                        v-for="(category, index) in doctor_main_categories.slice(0, 12)"
                        :key="index"
                        class="col-2"
                      >
                        <Link
                          class="text-decoration-none text-center"
                          :href="`${route('doctors.listing')}?doctor_category_slug=${
                            category.slug
                          }`"
                        >
                          <div class="card py-4 text-center mb-3">
                            <div class="d-flex justify-content-center mb-3">
                              <span class="card-icon"
                                ><img class="icon" :src="category.image" alt=""
                              /></span>
                            </div>
                            <h4 class="card-title text-black mb-2 fs-3">
                              {{ category.name }}
                            </h4>
                          </div>
                        </Link>
                      </div>
                    </div>

                  </div>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div
                class="dropdown doctors"
                @mouseenter="showDropdown('doctors')"
                @mouseleave="hideDropdown('doctors')"
              >
                <Link class="nav-link dropdown-toggle" :href="route('doctors.listing')">
                  {{ __("doctors") }}
                </Link>
                <ul
                  class="dropdown-menu dropdown-menu-center"
                  :class="{ show: dropdowns.doctors }"
                >
                  <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-end mb-3">
                            <Link
                      :href="route('doctors.listing')"
                      class="text-decoration-none text-primary fs-3 fw-normal"
                      >{{ __("view all") }}</Link
                    >
                        </div>
                      <div
                        class="col-md-3 px-0"
                        v-for="doctor in all_doctors.slice(0, 4)"
                        :key="doctor.id"
                      >
                        <Link
                          class="text-decoration-none pt-2"
                          :href="
                            route('doctor.profile', {
                              user_name: doctor.user_name,
                            })
                          "
                        >
                          <div class="card">
                            <div class="doctor-profile rounded-4 overflow-hidden">
                              <img class="img-fluid h-100 object-fit-cover" :src="doctor.image" alt="" />
                            </div>
                            <div class="card-body text-start text-black">
                              <h3 class="fs-22px text-primary fw-bold">
                                {{ doctor.name }}
                              </h3>
                              <h5 class="fs-3 text-black fw-normal">
                                {{ __("Surgeon, Сardiologist") }}
                              </h5>
                              <div class="d-flex justify-content-start">
                                <star-rating
                                  :rating="doctor.rating"
                                  :star-size="15"
                                  :read-only="true"
                                  :increment="0.01"
                                  :show-rating="false"
                                ></star-rating>
                              </div>
                            </div>
                          </div>
                        </Link>
                      </div>
                    </div>

                  </div>
                </ul>
              </div>
            </li>

            <!-- <li class="nav-item">
              <Link class="nav-link" :href="route('events.listing')">
              {{ __n("Events") }}
              </Link>
            </li> -->

            <li class="nav-item">
              <Link class="nav-link" :href="route('clinics.listing')">
                {{ __n("clinics") }}
              </Link>
            </li>

            <!-- <li class="nav-item dropdown" v-if="$page.props.company_pages && $page.props.company_pages.length > 0">

              <a class="nav-link dropdown-toggle" href="#" id="companyPagesDropDown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ __("Company Pages") }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="companyPagesDropDown">
                <li v-for="company_page in $page.props.company_pages" :key="company_page.id">
                  <Link class="dropdown-item" :href="route('company_pages.display', { slug: company_page.slug })">
                  {{ company_page.name }}
                  </Link>
                </li>

              </ul>
            </li> -->

            <!-- <li
              class="nav-item dropdown position-relative"
              v-if="$page.props.translation_languages"
            >
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="langDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ __(getSelectedLocate) }}
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end position-absolute start-0 mt-2"
                aria-labelledby="langDropdown"
              >
                <li
                  v-for="(lang, index) in $page.props.translation_languages"
                  :key="index"
                >
                  <Link
                    class="dropdown-item"
                    :href="route('language', { language: lang.code })"
                  >
                    {{ lang.name }}
                  </Link>
                </li>
              </ul>
            </li> -->

            <li
              class="nav-item list-unstyled d-block d-md-none"
              v-if="$page.props.auth && $page.props.auth.logged_in_as != 'super_admin'"
            >
              <div>
                <button
                  class="d-flex align-items-center nav-link position-relative bg-transparent border-0"
                  type="button"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasNavbar"
                  aria-controls="offcanvasNavbar"
                >
                  <div
                    v-if="
                      $page.props.auth.user.patient
                        ? $page.props.auth.user.patient
                        : $page.props.auth.user.doctor
                        ? $page.props.auth.user.doctor
                        : $page.props.auth.user.clinic
                    "
                    class="avatar-icon me-3"
                  >
                    <img
                      class="img-fluid rounded-circle"
                      :src="
                        $page.props.auth.user.patient
                          ? $page.props.auth.user.patient.image
                          : $page.props.auth.user.doctor
                          ? $page.props.auth.user.doctor.image
                          : $page.props.auth.user.clinic.image
                      "
                      alt=""
                    />
                  </div>
                  <div v-else class="avatar-icon me-3">
                    <img class="img-fluid" src="@/images/icons/user.png" alt="" />
                  </div>

                  <!-- <span
                class="position-absolute badge rounded-pill bg-primary"
                style="right: 8px; top: -10px"
                >{{
                  $page.props.auth.logged_in_as == "doctor"
                    ? "doctor"
                    : $page.props.auth.logged_in_as
                }}</span
              > -->
                  {{
                    $page.props.auth.logged_in_as != "super_admin" &&
                    $page.props.auth[$page.props.auth.logged_in_as].name
                  }}
                  <img class="" src="@/images/icons/arrowdrop.png" alt="" width="30" />
                </button>
              </div>
            </li>
          </ul>
          <div
            class="d-sm-block d-md-none d-flex flex-column gap-3 justify-content-center align-items-center mb-3"
          >
            <Link
              v-if="!$page.props.auth"
              :href="route('login')"
              class="btn btn-outline-primary btn-padding fs-3 shadow-none rounded-3 fw-normal me-md-4"
            >
              <span class="">{{ __("Login/Sign up") }}</span></Link
            >
            <Link
              v-if="!$page.props.auth"
              :href="route('register')"
              class="btn btn-secondary fs-3 btn-padding shadow-none rounded-3 fw-normal"
            >
              <span>{{ __("Join as Doctor") }}</span></Link
            >
          </div>
        </div>
        <Link class="navbar-brand mx-auto d-none d-md-block" :href="route('home')">
          <img
            v-if="$page.props && $page.props.settings && $page.props.settings.logo"
            style="width: 200px"
            :src="$page.props.settings.logo"
            alt="logo"
          />
          <span v-else class="text-white mt-4">
            {{
              $page.props && $page.props.settings && $page.props.settings.site_title
                ? $page.props.settings.site_title
                : __("doctor consultant")
            }}
          </span>
        </Link>
        <li
          class="nav-item list-unstyled d-none d-md-block"
          v-if="$page.props.auth && $page.props.auth.logged_in_as != 'super_admin'"
        >
          <div>
            <button
              class="d-flex dropdown-toggle align-items-center nav-link position-relative bg-transparent border-0"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar"
              aria-controls="offcanvasNavbar"
            >
              <div
                v-if="
                  $page.props.auth.user.patient
                    ? $page.props.auth.user.patient
                    : $page.props.auth.user.doctor
                    ? $page.props.auth.user.doctor
                    : $page.props.auth.user.clinic
                "
                class="avatar-icon me-3"
              >
                <img
                  class="img-fluid rounded-circle"
                  :src="
                    $page.props.auth.user.patient
                      ? $page.props.auth.user.patient.image
                      : $page.props.auth.user.doctor
                      ? $page.props.auth.user.doctor.image
                      : $page.props.auth.user.clinic.image
                  "
                  alt=""
                />
              </div>
              <div v-else class="avatar-icon me-3">
                <img class="img-fluid" src="@/images/icons/user.png" alt="" />
              </div>

              <!-- <span
                class="position-absolute badge rounded-pill bg-primary"
                style="right: 8px; top: -10px"
                >{{
                  $page.props.auth.logged_in_as == "doctor"
                    ? "doctor"
                    : $page.props.auth.logged_in_as
                }}</span
              > -->
              {{
                $page.props.auth.logged_in_as != "super_admin" &&
                $page.props.auth[$page.props.auth.logged_in_as].name
              }}
            </button>
          </div>
        </li>
        <li
          class="nav-item dropdown lang-dropdown list-unstyled me-md-4"
          v-if="$page.props.translation_languages"
        >
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="langDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            {{ getSelectedLocate }}
          </a>
          <ul class="dropdown-menu mt-4" aria-labelledby="langDropdown">
            <li v-for="lang in $page.props.translation_languages" :key="lang.id">
              <div class="mb-2">
                <Link
                  class="dropdown-item"
                  :href="route('language', { language: lang.code })"
                >
                  <img
                    class="me-2"
                    :src="'/assets/flags/' + lang.code + '.png'"
                    height="20"
                    width="25"
                  />
                  {{ lang.name }}
                </Link>
              </div>
            </li>
          </ul>
        </li>
        <div class="d-none d-md-block">
          <Link
            v-if="!$page.props.auth"
            :href="route('login')"
            class="btn btn-outline-primary btn-padding fs-3 shadow-none rounded-3 fw-normal me-md-3"
          >
            <span class="">{{ __("Login/Sign up") }}</span></Link
          >

          <Link
            v-if="!$page.props.auth"
            :href="route('register')"
            class="btn btn-secondary fs-3 btn-padding shadow-none rounded-3 fw-normal"
          >
            <span>{{ __("Join as Doctor") }}</span></Link
          >
        </div>
      </div>
    </nav>
    <div class="profile-canvas" v-if="$page.props.auth">
      <div
        class="offcanvas offcanvas-end"
        data-bs-scroll="true"
        data-bs-backdrop="true"
        tabindex="-1"
        id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel"
      >
        <div class="offcanvas-header py-5 d-flex justify-content-center">
          <div class="d-flex align-items-center flex-column justify-content-center">
            <div
              v-if="
                $page.props.auth && $page.props.auth.user.patient
                  ? $page.props.auth.user.patient
                  : $page.props.auth.user.doctor
                  ? $page.props.auth.user.doctor
                  : $page.props.auth.user.clinic
              "
              class="avatar-canvas-icon me-3"
            >
              <img
                class="img-fluid rounded-circle"
                :src="
                  $page.props.auth.user.patient
                    ? $page.props.auth.user.patient.image
                    : $page.props.auth.user.doctor
                    ? $page.props.auth.user.doctor.image
                    : $page.props.auth.user.clinic.image
                "
                alt=""
              />
            </div>
            <div v-else class="avatar-canvas-icon me-3">
              <img class="img-fluid" src="@/images/icons/user.png" alt="" />
            </div>
            <h5
              style="color: #383838"
              class="offcanvas-title mt-3 fs-1 fw-bold"
              id="offcanvasNavbarLabel"
            >
              {{
                $page.props.auth.logged_in_as != "super_admin" &&
                $page.props.auth[$page.props.auth.logged_in_as].name
              }}
            </h5>
          </div>
          <div class="custom2">
            <button
              type="button"
              class="btn-close bg-white rounded-circle me-2 mx-auto"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav">
            <li class="nav-items">
              <Link
                :href="route('account')"
                :class="{ active: route().current('account') }"
                class="d-flex align-items-center text-decoration-none gap-3"
              >
                <i class="bi bi-person"></i>
                {{ __("Profile") }}
              </Link>
            </li>
            <li v-if="!$page.props.auth.user.patient" class="nav-items">
              <Link
                :href="route('dashboard')"
                :class="{ active: route().current('dashboard') }"
                class="d-flex align-items-center text-decoration-none gap-3"
              >
                <i class="bi bi-clipboard-data-fill"></i>{{ __("dashboard") }}
              </Link>
            </li>
            <li
              v-if="$page.props.auth.logged_in_as == 'patient' && hasRole('patient')"
              class="nav-items"
              :class="{ active: route().current('patient-notifications') }"
            >
              <Link
                :href="route('patient-notifications')"
                class="d-flex align-items-center text-decoration-none gap-3"
              >
                <i class="bi bi-bell"></i>
                {{ __("Notification") }}
              </Link>
            </li>
            <li
              v-if="
                $page.props.auth.logged_in_as == 'doctor' ||
                $page.props.auth.logged_in_as == 'clinic'
              "
              class="nav-items"
            >
              <Link
                :href="route('dashboard', { active_tab: 'notifications' })"
                class="d-flex align-items-center text-decoration-none gap-3"
              >
                <i class="bi bi-bell"></i>
                {{ __("Notification") }}
              </Link>
            </li>
            <li
              v-if="$page.props.auth.logged_in_as == 'patient' && hasRole('patient')"
              class="nav-items"
              :class="{ active: route().current('appointment_log') }"
            >
              <Link
                :href="route('appointment_log')"
                class="d-flex align-items-center gap-3 text-decoration-none"
                ><i class="bi bi-journal-text"></i>{{ __("my appointments") }}</Link
              >
            </li>
            <li
              v-if="
                $page.props.auth.logged_in_as == 'doctor' ||
                $page.props.auth.logged_in_as == 'clinic'
              "
              class="nav-items"
            >
              <Link
                :href="route('dashboard', { active_tab: 'appointments' })"
                class="d-flex align-items-center gap-3 text-decoration-none"
                ><i class="bi bi-journal-text"></i>{{ __("my appointments") }}</Link
              >
            </li>
            <li
              v-if="
                ($page.props.auth.user.email_verified_at &&
                  hasRole('patient') &&
                  $page.props.auth.logged_in_as == 'patient') ||
                (hasRole('doctor') && $page.props.auth.logged_in_as == 'doctor') ||
                (hasRole('clinic') && $page.props.auth.logged_in_as == 'clinic')
              "
              class="nav-items"
              :class="{ active: route().current('service_log') }"
            >
              <Link :href="route('service_log')" class="dropdown-item d-flex gap-3">
                <i class="bi bi-briefcase"></i>{{ __("my services") }}</Link
              >
            </li>
            <li
              v-if="
                ($page.props.auth.user.email_verified_at &&
                  hasRole('doctor') &&
                  $page.props.auth.logged_in_as == 'doctor') ||
                ($page.props.auth.user.email_verified_at &&
                  hasRole('clinic') &&
                  $page.props.auth.logged_in_as == 'clinic')
              "
              class="nav-items"
            >
              <Link
                :href="route('dashboard', { active_tab: 'subscription-plan' })"
                class="dropdown-item d-flex gap-3"
                ><i class="bi bi-currency-dollar"></i>{{ __("subscription") }}
              </Link>
            </li>
            <!-- <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                $page.props.auth.logged_in_as == 'patient'
              "
              class="nav-items"
            >
              <Link
                :href="route('pricing', { type: 'patient' })"
                class="dropdown-item d-flex gap-3"
                ><i class="bi bi-currency-dollar"></i>{{ __("subscription") }}
              </Link>
            </li> -->

            <li
              v-if="
                parseInt(this.$page.props.settings.enable_wallet_system) &&
                $page.props.auth.user.email_verified_at &&
                $page.props.auth.logged_in_as == 'patient'
              "
              class="nav-items"
              :class="{ active: route().current('wallet') }"
            >
              <Link
                :href="route('wallet')"
                class="d-flex gap-3 align-items-center text-decoration-none"
              >
                <i class="bi bi-wallet"></i>
                {{ __("wallet") }}</Link
              >
            </li>
            <li
              v-if="
                (parseInt(this.$page.props.settings.enable_wallet_system) &&
                  $page.props.auth.user.email_verified_at &&
                  hasRole('doctor') &&
                  $page.props.auth.logged_in_as == 'doctor') ||
                (hasRole('clinic') && $page.props.auth.logged_in_as == 'clinic')
              "
              class="nav-items"
            >
              <Link
                :href="route('dashboard', { active_tab: 'wallet-transactions' })"
                class="d-flex gap-3 align-items-center text-decoration-none"
              >
                <i class="bi bi-wallet"></i>
                {{ __("wallet") }}</Link
              >
            </li>
            <li
              v-if="$page.props.auth.logged_in_as == 'patient'"
              class="nav-items"
              :class="{
                active: route().current('patients.ehr.listing '),
              }"
            >
              <Link
                :href="route('patients.ehr.listing ')"
                class="d-flex gap-3 align-items-center text-decoration-none"
                ><i class="bi bi-clipboard2-pulse"></i
                >{{ __("Electronic Health Records") }}</Link
              >
            </li>

            <!-- <Link :href="route('logout')" class="dropdown-item">
                    <i class="bi bi-box-arrow-in-left"></i>
                      {{__("logout")}}
                    </Link> -->
            <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                hasRole('doctor') &&
                $page.props.auth.logged_in_as != 'doctor'
              "
              class="nav-items"
            >
              <button
                @click="switchRole('doctor')"
                class="dropdown-item new1 d-flex gap-3"
              >
                <img src="@/images/icons/userdoctor.svg" width="18" alt="" />
                {{ __("switch to doctor") }}
              </button>
            </li>
            <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                !hasRole('doctor') &&
                $page.props.auth.logged_in_as != 'doctor'
              "
              class="nav-items"
            >
              <button @click="becomeDoctor()" class="dropdown-item new1 d-flex gap-3">
                <img src="@/images/icons/userdoctor.svg" width="18" alt="" />
                {{ __("become a doctor") }}
              </button>
            </li>

            <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                hasRole('patient') &&
                $page.props.auth.logged_in_as != 'patient'
              "
              class="nav-items"
            >
              <button
                @click="switchRole('patient')"
                class="dropdown-item new1 d-flex gap-3"
              >
                <i class="bi bi-person-circle"></i> {{ __("switch to user") }}
              </button>
            </li>
            <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                !hasRole('patient') &&
                $page.props.auth.logged_in_as != 'patient'
              "
              class="nav-items"
            >
              <button @click="becomeUser()" class="dropdown-item new1 d-flex gap-3">
                <i class="bi bi-person-circle"></i>{{ __("become a user") }}
              </button>
            </li>

            <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                hasRole('clinic') &&
                $page.props.auth.logged_in_as != 'clinic'
              "
              class="nav-items"
            >
              <button
                @click="switchRole('clinic')"
                class="dropdown-item new1 d-flex gap-3"
              >
                <i class="bi bi-hospital"></i>{{ __("switch to clinic") }}
              </button>
            </li>
            <li
              v-if="
                $page.props.auth.user.email_verified_at &&
                !hasRole('clinic') &&
                $page.props.auth.logged_in_as != 'clinic'
              "
              class="nav-items"
            >
              <button @click="becomeClinic()" class="dropdown-item new1 d-flex gap-3">
                <i class="bi bi-hospital"></i>{{ __("become a clinic") }}
              </button>
            </li>
            <li class="nav-items">
              <button
                style="cursor: pointer"
                @click="logout()"
                class="dropdown-item new1 d-flex gap-3"
              >
                <i class="bi bi-box-arrow-in-left"></i> {{ __("logout") }}
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div
      class="offcanvas offcanvas-start"
      tabindex="-1"
      id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
          <Link class="navbar-brand mx-auto" :href="route('home')">
            <img
              v-if="$page.props && $page.props.settings && $page.props.settings.logo"
              style="width: 200px"
              :src="$page.props.settings.logo"
              alt="logo"
            />
            <span v-else class="text-white mt-4">
              {{
                $page.props && $page.props.settings && $page.props.settings.site_title
                  ? $page.props.settings.site_title
                  : __("doctor consultant")
              }}
            </span>
          </Link>
        </h5>

        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('home')"
              :class="{ active: route().current('home') }"
            >
              {{ __("Home") }}
            </Link>
          </li>
          <div class="dropdown mobile-dropdown" v-if="$page.props.auth">
            <button
              class="nav-link dropdown-toggle d-flex align-items-center bg-transparent border-0"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              {{
                $page.props.auth.logged_in_as != "super_admin" &&
                $page.props.auth[$page.props.auth.logged_in_as].name
              }}
            </button>
            <ul class="dropdown-menu px-3">
              <li class="nav-item">
                <Link
                  :href="route('account')"
                  :class="{ active: route().current('account') }"
                  class="nav-link"
                >
                  {{ __("Profile") }}
                </Link>
              </li>
              <li v-if="!$page.props.auth.user.patient" class="nav-item">
                <Link
                  :href="route('dashboard')"
                  :class="{ active: route().current('dashboard') }"
                  class="nav-link"
                >
                  {{ __("dashboard") }}
                </Link>
              </li>
              <li
                class="nav-item"
                :class="{ active: route().current('patient-notifications') }"
              >
                <Link :href="route('patient-notifications')" class="nav-link">
                  {{ __("Notification") }}
                </Link>
              </li>
              <li
                v-if="
                  ($page.props.auth.user.email_verified_at &&
                    hasRole('patient') &&
                    $page.props.auth.logged_in_as == 'patient') ||
                  (hasRole('doctor') && $page.props.auth.logged_in_as == 'doctor') ||
                  (hasRole('clinic') && $page.props.auth.logged_in_as == 'clinic')
                "
                class="nav-item"
                :class="{ active: route().current('appointment_log') }"
              >
                <Link :href="route('appointment_log')" class="nav-link">{{
                  __("my appointments")
                }}</Link>
              </li>
              <li
                v-if="
                  ($page.props.auth.user.email_verified_at &&
                    hasRole('patient') &&
                    $page.props.auth.logged_in_as == 'patient') ||
                  (hasRole('doctor') && $page.props.auth.logged_in_as == 'doctor') ||
                  (hasRole('clinic') && $page.props.auth.logged_in_as == 'clinic')
                "
                class="nav-item"
                :class="{ active: route().current('service_log') }"
              >
                <Link :href="route('service_log')" class="nav-link">
                  {{ __("my services") }}</Link
                >
              </li>
              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  hasRole('doctor') &&
                  $page.props.auth.logged_in_as == 'doctor'
                "
                class="nav-item"
                :class="{ active: route().current('pricing') }"
              >
                <Link :href="route('pricing', { type: 'doctor' })" class="nav-link"
                  >{{ __("subscription") }}
                </Link>
              </li>
              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  hasRole('clinic') &&
                  $page.props.auth.logged_in_as == 'clinic'
                "
                class="nav-item"
              >
                <Link :href="route('pricing', { type: 'clinic' })" class="nav-link"
                  >{{ __("subscription") }}
                </Link>
              </li>

              <li
                v-if="
                  (parseInt(this.$page.props.settings.enable_wallet_system) &&
                    $page.props.auth.user.email_verified_at &&
                    hasRole('patient') &&
                    $page.props.auth.logged_in_as == 'patient') ||
                  (hasRole('doctor') && $page.props.auth.logged_in_as == 'doctor') ||
                  (hasRole('clinic') && $page.props.auth.logged_in_as == 'clinic')
                "
                class="nav-item"
                :class="{ active: route().current('wallet') }"
              >
                <Link :href="route('wallet')" class="nav-link"> {{ __("wallet") }}</Link>
              </li>
              <li
                v-if="$page.props.auth.logged_in_as == 'patient'"
                class="nav-item"
                :class="{
                  active: route().current('patients.ehr.listing '),
                }"
              >
                <Link :href="route('patients.ehr.listing ')" class="nav-link">
                  {{ __("Electronic Health Records") }}</Link
                >
              </li>

              <!-- <Link :href="route('logout')" class="dropdown-item">
                    <i class="bi bi-box-arrow-in-left"></i>
                      {{__("logout")}}
                    </Link> -->
              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  hasRole('doctor') &&
                  $page.props.auth.logged_in_as != 'doctor'
                "
                class="nav-item"
              >
                <button @click="switchRole('doctor')" class="nav-link">
                  {{ __("switch to doctor") }}
                </button>
              </li>
              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  !hasRole('doctor') &&
                  $page.props.auth.logged_in_as != 'doctor'
                "
                class="nav-item"
              >
                <button @click="becomeDoctor()" class="nav-link">
                  {{ __("become a doctor") }}
                </button>
              </li>

              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  hasRole('patient') &&
                  $page.props.auth.logged_in_as != 'patient'
                "
                class="nav-item"
              >
                <button @click="switchRole('patient')" class="nav-link">
                  {{ __("switch to user") }}
                </button>
              </li>
              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  !hasRole('patient') &&
                  $page.props.auth.logged_in_as != 'patient'
                "
                class="nav-item"
              >
                <button @click="becomeUser()" class="nav-link">
                  {{ __("become a user") }}
                </button>
              </li>

              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  hasRole('clinic') &&
                  $page.props.auth.logged_in_as != 'clinic'
                "
                class="nav-item"
              >
                <button @click="switchRole('clinic')" class="nav-link">
                  {{ __("switch to clinic") }}
                </button>
              </li>
              <li
                v-if="
                  $page.props.auth.user.email_verified_at &&
                  !hasRole('clinic') &&
                  $page.props.auth.logged_in_as != 'clinic'
                "
                class="nav-item"
              >
                <button @click="becomeClinic()" class="nav-link">
                  {{ __("become a clinic") }}
                </button>
              </li>
              <li class="nav-item">
                <button style="cursor: pointer" @click="logout()" class="nav-link">
                  <i class="bi bi-box-arrow-in-left"></i> {{ __("logout") }}
                </button>
              </li>
            </ul>
          </div>
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('categories')"
              :class="{ active: route().current('categories') }"
            >
              {{ __("departments") }}
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('doctors.listing')"
              :class="{ active: route().current('doctors') }"
            >
              {{ __("doctors") }}
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('clinics.listing')"
              :class="{ active: route().current('clinics') }"
            >
              {{ __("clinics") }}
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('services.listing')"
              :class="{ active: route().current('services') }"
            >
              {{ __("services") }}
            </Link>
          </li>

          <Link
            v-if="!$page.props.auth"
            :href="route('login')"
            class="btn btn-outline-primary btn-padding fs-3 shadow-none rounded-3 fw-normal me-md-4 mb-2 mt-3 mt-md-0"
          >
            <span class="">{{ __("Login/Sign up") }}</span></Link
          >
          <Link
            v-if="!$page.props.auth"
            :href="route('register')"
            class="btn btn-secondary fs-3 btn-padding shadow-none rounded-3 fw-normal"
          >
            <span>{{ __("Join as Doctor") }}</span></Link
          >
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import CategoriesSkeleton from "@/Components/Skeleton/CategoriesSkeleton.vue";
export default {
  components: {
    Link,
    CategoriesSkeleton,
  },
  data() {
    return {
      fetching: true,
      locale: this.$page.props.locale,
      doctor_main_categories: [],
      all_doctors: [],
      clinics: [],
      view: {
        topOfPage: true,
        pusherDeviceId: "",
      },
      dropdowns: {
        department: false,
        doctors: false,
        // Add other dropdowns as needed
      },
      hoverTimeout: null,
    };
  },
  beforeMount() {
    window.addEventListener("scroll", this.handleScroll);
  },
  mounted(){
    this.getDoctorMainCategories();
    this.getDoctors();
  },
  methods: {
    showDropdown(type) {
      clearTimeout(this.hoverTimeout);
      this.hoverTimeout = setTimeout(() => {
        this.dropdowns[type] = true;
        if (type === "department") {
          this.dropdowns.doctors = false;
        } else if (type === "doctors") {
          this.dropdowns.department = false;
        }
      }, 200);
    },

    hideDropdown(type) {
      clearTimeout(this.hoverTimeout);
      this.hoverTimeout = setTimeout(() => {
        this.dropdowns[type] = false;
      }, 200);
    },
    logout() {
      if (this.$page.props.settings.pusher_beams_instance_id) {
        const VITE_PUSHER_BEAMS_INSTANCE_ID = this.$page.props.settings
          .pusher_beams_instance_id;
        const beamsClient = new PusherPushNotifications.Client({
          instanceId: VITE_PUSHER_BEAMS_INSTANCE_ID,
        });
        //   beamsClient
        //     .start()
        //     .then((beamsClient) => beamsClient.getDeviceId())
        //     .then((deviceId) => {
        //
        //         this.pusherDeviceId = deviceId
        //     })
        beamsClient
          .clearAllState()
          .then(async () => {})
          .catch((e) => console.error("Could not clear Beams state", e));
      }

      this.$inertia.get(route("logout"));
    },
    switchLanguage() {
      this.$inertia.get(route("language", { language: this.locale }));
    },
    switchRole(role) {
      this.$emit("showLoaderEvent", 1);
      if (this.$page.props.settings.pusher_beams_instance_id) {
        const VITE_PUSHER_BEAMS_INSTANCE_ID = this.$page.props.settings
          .pusher_beams_instance_id;
        const beamsClient = new PusherPushNotifications.Client({
          instanceId: VITE_PUSHER_BEAMS_INSTANCE_ID,
        });
        beamsClient
          .clearAllState()
          .then(() => {})
          .catch((e) => console.error("Could not clear Beams state", e));
      }
      this.$inertia.post(this.route("account.switch_role", { role: role }), {
        onFinish: () => this.$toast.show("Switched To " + role),
      });
    },
    becomeDoctor() {
      this.$emit("showLoaderEvent", 1);
      this.$inertia.post(this.route("account.become_doctor"), {
        onFinish: () => this.$toast.show("You are now a Doctor"),
      });
    },
    becomeUser() {
      this.$emit("showLoaderEvent", 1);
      this.$inertia.post(this.route("account.become_user"), {
        onFinish: () => this.$toast.show("You are now a Patient"),
      });
    },
    becomeClinic() {
      this.$emit("showLoaderEvent", 1);
      this.$inertia.post(this.route("account.become_clinic"), {
        onFinish: () => this.$toast.show("You are now a clinic User"),
      });
    },
    getDoctorMainCategories() {
      axios.get(this.route("getApiDoctorMainCategories")).then((res) => {
        this.doctor_main_categories = res.data.data;
        this.fetching = false;
      });
    },
    getDoctors() {
      axios.get(this.route("getApiFeaturedDoctors")).then((res) => {
        this.all_doctors = res.data.data;
        this.fetching = false;
      });
    },
    handleScroll() {
      if (window.pageYOffset > 0) {
        if (this.view.topOfPage) this.view.topOfPage = false;
      } else {
        if (!this.view.topOfPage) this.view.topOfPage = true;
      }
    },
  },
  computed: {
    getSelectedLocate() {
      var index = this.$page.props.translation_languages.findIndex(
        (obj) => obj.code === this.locale
      );
      if (index >= 0) {
        return this.$page.props.translation_languages[index].name;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.opacity-90 {
  opacity: 0.9;
}

.navbar-transparent {
  background: transparent !important;
}

.navbar-light {
  background-color: white !important;
}
</style>
