<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 h-screen pt-20 transition-transform -translate-x-full border-r w-72 bg-gradient-to-b from-violet-900 via-purple-900 to-indigo-900 border-violet-800/50 sm:translate-x-0"
    aria-label="Sidebar">

    <div class="h-[calc(100vh-5rem)] px-4 py-6 overflow-y-auto pb-24">
        <div class="mb-8">
            <p class="px-3 mb-3 text-xs font-semibold tracking-wider uppercase text-white/50">Main Menu</p>
            <ul class="space-y-1 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(2) == 'dashboard' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                {{-- Quizzes --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white group {{ request()->segment(1) == 'quizzes' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}"
                        aria-controls="dropdown-quizzes" data-collapse-toggle="dropdown-quizzes">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/5 group-hover:bg-white/10">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Quizzes</span>
                        <svg class="w-4 h-4 ml-auto duration-300 transform rotate-90" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <ul id="dropdown-quizzes"
                        class="py-2 space-y-2 {{ request()->segment(1) == 'quizzes' ? '' : 'hidden' }}">
                        <li>
                            <a href="{{ route('quiz.index') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'quiz' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Quiz</a>
                        </li>
                        <li>
                            <a href="{{ route('criteria.index') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'criteria' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Evaluation
                                Criteria</a>
                        </li>
                        <li>
                            <a href="{{ route('intelligence.index') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'intelligance' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Intelligance</a>
                        </li>
                        <li>
                            <a href="{{ route('job-intelligence.index') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'job-intelligence' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Job
                                Intelligence</a>
                        </li>
                        <li>
                            <a href="{{ route('question.index') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'question' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Question</a>
                        </li>
                    </ul>
                </li>
                {{-- End Quizzes --}}

                {{-- User --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white group {{ request()->segment(1) == 'users' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}"
                        aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/5 group-hover:bg-white/10">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Users</span>
                        <svg class="w-4 h-4 ml-auto duration-300 transform rotate-90" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <ul id="dropdown-users"
                        class="py-2 space-y-2 {{ request()->segment(1) == 'users' ? '' : 'hidden' }}">
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'all' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">All</a>
                        </li>
                        <li>
                            <a href="{{ route('users.siswa') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'siswa' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Siswa</a>
                        </li>
                        <li>
                            <a href="{{ route('users.guru') }}"
                                class="flex items-center w-full px-4 py-2 transition-all duration-200 rounded-xl hover:bg-white/10 hover:text-white pl-11 group {{ request()->segment(2) == 'guru' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }} ">Guru</a>
                        </li>
                    </ul>
                </li>
                {{-- End User --}}

                {{-- Result --}}
                <li>
                    <a href="{{ route('result.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(2) == 'result' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Result</span>
                    </a>
                </li>
                {{-- End Result --}}

                <li>
                    <a href="{{ route('type-study.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(1) == 'type-study' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Type Study</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('study-details.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(1) == 'study-details' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Study Details</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('universitas.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(1) == 'universitas' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Universitas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('quota-mabas.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(1) == 'quota-mabas' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Quota Maba</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('program-studies.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(1) == 'program-studies' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Program Study</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('alumnis.index') }}"
                        class="flex items-center px-4 py-2 transition-all duration-200 hover:text-white rounded-xl group {{ request()->segment(1) == 'alumnis' ? 'text-white bg-white/20 backdrop-blur-sm' : 'text-white/80' }}">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/10 group-hover:bg-white/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="font-medium">Alumni</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-4 py-2 transition-all duration-200 text-white/80 rounded-xl hover:bg-white/10 hover:text-white group">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/5 group-hover:bg-white/10">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="font-medium">Materi</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-4 py-2 transition-all duration-200 text-white/80 rounded-xl hover:bg-white/10 hover:text-white group">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/5 group-hover:bg-white/10">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <span class="font-medium">Topik</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-4 py-2 transition-all duration-200 text-white/80 rounded-xl hover:bg-white/10 hover:text-white group">
                        <div
                            class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-white/5 group-hover:bg-white/10">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="font-medium">LKPD</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
