<div>
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <a class="btn shadow-blur mb-0 p-2 px-3" role="button"
                    style="display: flex; align-items: center; background-color: white;">
                    <i class="fa-solid fa-magnifying-glass fa-xl me-2"></i>
                    <input type="search" id="search-bar-input" class="form-control text-black text-lg" style="background: transparent"
                        placeholder="Whats Your Problem...">
                    <span class="DocSearch-Button-Keys">
                        <button wire:click='resetSearch' class="DocSearch-Button-Key px-4 py-3">Clear</button>
                    </span>
                </a>
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-6 shadow-dark">
                            <div class="container">
                                {{-- <div id="searchbox">
                                </div>
                                <div id="hits">
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                            const search = instantsearch({
                                                indexName: 'knowledge-base',
                                                searchClient: algoliasearch(
                                                    '9T5VNL71TX',
                                                    '39a815806926d06cf349b261d85cf33a'
                                                ),
                                            });
                                
                                            const {
                                                searchBox,
                                                hits, 
                                            } = instantsearch.widgets;
                                
                                            search.addWidgets([
                                                searchBox({
                                                    container: "#searchbox"
                                                }),
                                                hits({
                                                    container: "#hits"
                                                }), 
                                            ]);
                                
                                            search.start();
                                        });
                                </script> --}}
                            </div>
                        </div>
                        <div class="col-6">
                            <p>content 2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-2">
        <div class="page-header min-vh-75 relative" style="background-image: url('./assets/img/bg2.jpg')">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n5">SISTEM MANAJEMEN TI PELITA ALAM</h1>
                        <p class="lead text-white mt-3 mb-5">Free & Open Source Web UI Kit built over Bootstrap 5. <br />
                            Join over 1.6 million developers around the world. </p>
                            <style>
                                /* Menyesuaikan lebar offcanvas */
                                .offcanvas {
                                    max-width: 50%;
                                    /* Sesuaikan lebar sesuai kebutuhan Anda */
                                }
                            
                                /* Menyesuaikan tinggi offcanvas */
                                .offcanvas-body {
                                    max-height: 50vh;
                                    /* Sesuaikan tinggi sesuai kebutuhan Anda */
                                    overflow-y: auto;
                                }
                            </style>
                        <a class="btn btn-rounded border mb-0 me-2 p-2 px-3" data-bs-toggle="modal" data-bs-target="#searchModal" role="button" style="display: flex; align-items: center; background-color: white;" >
                            <i class="fa-solid fa-magnifying-glass fa-xl me-2"></i>
                                <input type="text" class="form-control text-black text-sm" style="background: transparent" placeholder="Whats Your Problem..." >
                            <span class="DocSearch-Button-Keys">
                                <kbd class="DocSearch-Button-Key">
                                    <svg width="15" height="15" class="DocSearch-Control-Key-Icon">
                                        <path
                                            d="M4.505 4.496h2M5.505 5.496v5M8.216 4.496l.055 5.993M10 7.5c.333.333.5.667.5 1v2M12.326 4.5v5.996M8.384 4.496c1.674 0 2.116 0 2.116 1.5s-.442 1.5-2.116 1.5M3.205 9.303c-.09.448-.277 1.21-1.241 1.203C1 10.5.5 9.513.5 8V7c0-1.57.5-2.5 1.464-2.494.964.006 1.134.598 1.24 1.342M12.553 10.5h1.953"
                                            stroke-width="1.2" stroke="currentColor" fill="none" stroke-linecap="square"></path>
                                    </svg>
                                </kbd>
                                <kbd class="DocSearch-Button-Key">K</kbd>
                            </span>
                        </a>

                        {{-- <div id="autocomplete"></div> 
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                            const searchClient = algoliasearch(
                              '9T5VNL71TX',
                              '39a815806926d06cf349b261d85cf33a'
                            ); 

                            const querySuggestionsPlugin = createQuerySuggestionsPlugin({
                                searchClient,
                                indexName: 'knowledge-base_query_suggestions', 
                                transformSource({ source }) {
                                    return {
                                    ...source,
                                    templates: Object.assign({}, source.templates, {
                                        header: function ({ state }) {
                                        if (state.query) {
                                            return null;
                                        }

                                        var fragment = document.createDocumentFragment();
                                        var span = document.createElement('span');
                                        span.className = 'aa-SourceHeaderTitle';
                                        span.textContent = 'Popular searches';
                                        fragment.appendChild(span);

                                        var div = document.createElement('div');
                                        div.className = 'aa-SourceHeaderLine';
                                        fragment.appendChild(div);

                                        return fragment;
                                        },
                                    }),
                                    };
                                },
                                });
                        
                            autocomplete({
                              container: '#autocomplete',
                              detachedMediaQuery: '',
                              openOnFocus: true,
                              placeholder: 'What\'s Your Problem?',
                              plugins: [
                                querySuggestionsPlugin,
                              ],
                              getSources() {
                                return [];
                              },
                            });
                          });
                        </script> --}}
                        {{-- @livewire('autocomplete') --}}
                        
                        {{-- <header class="header">
                            <div id="autocomplete"></div>
                        </header>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () { 
                                    const searchClient = algoliasearch(
                                        '9T5VNL71TX',
                                        '39a815806926d06cf349b261d85cf33a',
                                    );
                                    
                                    const INSTANT_SEARCH_INDEX_NAME = 'knowledge-base';
                                    const instantSearchRouter = historyRouter();

                                    const search = instantsearch({
                                        searchClient,
                                        indexName: INSTANT_SEARCH_INDEX_NAME,
                                        routing: instantSearchRouter,
                                    });
                        
                                    // const {
                                    //     searchBox,
                                    //     hits, 
                                    // } = instantsearch.widgets;

                                    const virtualSearchBox = connectSearchBox(() => {});
                        
                                    search.addWidgets([
                                        virtualSearchBox({}),
                                        hits({
                                            container: '#hits',
                                            templates: {
                                            item(hit, { html, components }) {
                                                return html`
                                                <div>
                                                    ${components.Highlight({ attribute: 'title', hit })}
                                                </div>
                                                `;
                                            },
                                            },
                                        }),
                                    ]);
                        
                                    search.start();

                                    // Set the InstantSearch index UI state from external events.
                                    function setInstantSearchUiState(indexUiState) {
                                        search.setUiState(uiState => ({
                                            ...uiState,
                                            [INSTANT_SEARCH_INDEX_NAME]: {
                                            ...uiState[INSTANT_SEARCH_INDEX_NAME],
                                            // We reset the page when the search state changes.
                                            page: 1,
                                            ...indexUiState,
                                            },
                                        }));
                                    }

                                    // Return the InstantSearch index UI state.
                                    function getInstantSearchUiState() {
                                        const uiState = instantSearchRouter.read();

                                        return (uiState && uiState[INSTANT_SEARCH_INDEX_NAME]) || {};
                                    }

                                    const searchPageState = getInstantSearchUiState();

                                    let skipInstantSearchUiStateUpdate = false;
                                    const { setQuery } = autocomplete({
                                        container: '#autocomplete',
                                        placeholder: 'Search for products',
                                        detachedMediaQuery: 'none',
                                        initialState: {
                                            query: searchPageState.query || '',
                                        },
                                        onSubmit({ state }) {
                                            setInstantSearchUiState({ query: state.query });
                                        },
                                        onReset() {
                                            setInstantSearchUiState({ query: '' });
                                        },
                                        onStateChange({ prevState, state }) {
                                            if (!skipInstantSearchUiStateUpdate && prevState.query !== state.query) {
                                            setInstantSearchUiState({ query: state.query });
                                            }
                                            skipInstantSearchUiStateUpdate = false;
                                        },
                                    })

                                    // This keeps Autocomplete aware of state changes coming from routing
                                    // and updates its query accordingly
                                    window.addEventListener('popstate', () => {
                                        skipInstantSearchUiStateUpdate = true;
                                        setQuery(search.helper?.state.query || '');
                                    });
                                });
                        </script> --}}
                        {{-- <div id="searchbox">
                        </div>
                        <div id="hits">
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                    const search = instantsearch({
                                        indexName: 'knowledge-base',
                                        searchClient: algoliasearch(
                                            '9T5VNL71TX',
                                            '39a815806926d06cf349b261d85cf33a'
                                        ),
                                    });
                        
                                    const {
                                        searchBox,
                                        hits, 
                                    } = instantsearch.widgets;
                        
                                    search.addWidgets([
                                        searchBox({
                                            container: "#searchbox"
                                        }),
                                        hits({
                                            container: "#hits",
                                            templates: {
                                            item: (hit, { html, components }) => html`
                                            <div>
                                                <div class="hit-title align-items-start">
                                                    ${components.Highlight({ hit, attribute: 'title' })}
                                                </div>
                                                <div class="hit-details">
                                                    ${components.Highlight({ hit, attribute: 'details' })}
                                                </div>
                                                <div class="hit-price">$${hit.price}</div>
                                            </div>
                                            `,
                                            },
                                        }), 
                                    ]);
                        
                                    search.start();
                                });
                        </script> --}}

                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <div class="row">
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"><span id="state1" countTo="70">0</span>+</h1>
                                    <h5 class="mt-3">Coded Elements</h5>
                                    <p class="text-sm font-weight-normal">From buttons, to inputs, navbars, alerts or
                                        cards, you are covered</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary"> <span id="state2" countTo="15">0</span>+
                                    </h1>
                                    <h5 class="mt-3">Design Blocks</h5>
                                    <p class="text-sm font-weight-normal">Mix the sections, change the colors and
                                        unleash your creativity</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-primary" id="state3" countTo="4">0</h1>
                                    <h5 class="mt-3">Pages</h5>
                                    <p class="text-sm font-weight-normal">Save 3-4 weeks of work when you use our
                                        pre-made pages for your website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="my-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                <div class="front front-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80); background-size: cover;">
                                    <div class="card-body py-7 text-center">
                                        <i class="material-icons text-white text-4xl my-3">touch_app</i>
                                        <h3 class="text-white">Feel the <br /> Material Kit</h3>
                                        <p class="text-white opacity-8">All the Bootstrap components that you need in a
                                            development have been re-design with the new look.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Discover More</h3>
                                        <p class="text-white opacity-8"> You will save a lot of time going from
                                            prototyping to full-functional code because all elements are implemented.
                                        </p>
                                        <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="material-icons text-gradient text-primary text-3xl">content_copy</i>
                                    <h5 class="font-weight-bolder mt-3">Full Documentation</h5>
                                    <p class="pe-5">Built by developers for developers. Check the foundation and you
                                        will find everything inside our documentation.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="material-icons text-gradient text-primary text-3xl">flip_to_front</i>
                                    <h5 class="font-weight-bolder mt-3">Bootstrap 5 Ready</h5>
                                    <p class="pe-3">The world’s most popular front-end open source toolkit, featuring
                                        Sass variables and mixins.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-5">
                            <div class="col-md-6 mt-3">
                                <i class="material-icons text-gradient text-primary text-3xl">price_change</i>
                                <h5 class="font-weight-bolder mt-3">Save Time & Money</h5>
                                <p class="pe-5">Creating your design from scratch with dedicated designers can be very
                                    expensive. Start with our Design System.</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="info">
                                    <i class="material-icons text-gradient text-primary text-3xl">devices</i>
                                    <h5 class="font-weight-bolder mt-3">Fully Responsive</h5>
                                    <p class="pe-3">Regardless of the screen size, the website content will naturally
                                        fit the given resolution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>