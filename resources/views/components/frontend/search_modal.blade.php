<!-- Button trigger modal -->
<style>
    :root {
        --primary_color_search: rgb(10, 124, 168);
    }

    #docSearch_byModel_own .modal-content {
        background: #2e3033;
    }

    #docSearch_byModel_own .modal-body {
        padding-bottom: 0;
        padding-top: 0;
    }

    #docSearch_byModel_own .modal-body .no_content {
        min-height: 150px;
        text-align: center
    }

    #docSearch_byModel_own .modal-body a {
        text-decoration: none;
        color: black;
        display: flex;
        gap: 15px;
        padding: 10px;
        align-items: center;
        background: white;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    #docSearch_byModel_own .modal-body a .title_post {
        font-size: .9em;
        font-weight: 700;
    }

    #docSearch_byModel_own .modal-body a .description {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        font-size: .75em;
    }

    #docSearch_byModel_own .modal-body div.title {
        color: var(--primary_color_search);
        margin-bottom: 5px;
        font-weight: 700;
    }

    #docSearch_byModel_own .modal-body a.active,
    #docSearch_byModel_own .modal-body a:hover {
        color: white;
        align-items: center;
        background: var(--primary_color_search);
    }

    #docSearch_byModel_own .modal-footer {
        padding-top: 0;
        padding-bottom: 0;
        border-top: 0px;
    }

    #docSearch_byModel_own footer.DocSearch-Footer {
        display: flex;
        flex-direction: row-reverse;
        width: 100%;
        justify-content: center;
        align-items: center;
        font-size: 16px;

    }

    #docSearch_byModel_own ul.DocSearch-Commands {
        list-style: none;
        display: flex;
        gap: 10px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    #docSearch_byModel_own ul.DocSearch-Commands li {
        display: flex;
        gap: 3px;
        margin-right: 5px;

    }

    #docSearch_byModel_own .fa-search {
        position: absolute;
        top: 50%;
        left: 30px;
        z-index: 5;
        transform: translateY(-50%);
        font-size: 25px;
        color: #c8c4c4;

    }

    #docSearch_byModel_own .modal-header {
        position: relative;
        border-bottom: 0px;
    }

    #docSearch_byModel_own input#search_diaload_input {
        padding: 15px 15px 15px 50px;
    }
</style>

{{-- <button type="button" class="btn btn-primary docSearch_byModel_own" data-toggle="modal"
    data-target="#docSearch_byModel_own">
    Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="docSearch_byModel_own" tabindex="-1" role="dialog"
    aria-labelledby="docSearch_byModel_ownTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="search" id="search_diaload_input" class="form-control"
                    placeholder="Enter your Keywords ....">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="modal-body ">
                <div class="d-flex align-items-center gap-4 no_content justify-content-center">
                    <svg width="40" height="40" viewBox="0 0 20 20" fill="none" fill-rule="evenodd"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M15.5 4.8c2 3 1.7 7-1 9.7h0l4.3 4.3-4.3-4.3a7.8 7.8 0 01-9.8 1m-2.2-2.2A7.8 7.8 0 0113.2 2.4M2 18L18 2">
                        </path>
                    </svg> No Content Found
                </div>
                {{-- <ul class="list-unstyled" id="Item_diaload_menu">
                    <li class="">
                        <a class="text-decoration-none" href="#">
                            <i class="fa fa-code" aria-hidden="true"></i>
                            <div>
                                <div class="title_post">
                                    This is Pragraphp
                                </div>
                                <div class="description">
                                    This is Pragraphp
                                    This is Pragraphp
                                    This is Pragraphp
                                    This is Pragraphp
                                    This is Pragraphp
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="lksdjl">
                            <i class="fa fa-code" aria-hidden="true"></i>
                            <div> This is Pragraphp</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-code" aria-hidden="true"></i>
                            <div> This is Pragraphp</div>
                        </a>
                    </li>
                </ul> --}}
            </div>
            <div class="modal-footer">
                <footer class="DocSearch-Footer">

                    <ul class="DocSearch-Commands">
                        <li><kbd class="DocSearch-Commands-Key"><svg width="15" height="15" aria-label="Enter key"
                                    role="img">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.2">
                                        <path d="M12 3.53088v3c0 1-1 2-2 2H4M7 11.53088l-3-3 3-3"></path>
                                    </g>
                                </svg></kbd><span class="DocSearch-Label">to select</span></li>
                        <li><kbd class="DocSearch-Commands-Key"><svg width="15" height="15" aria-label="Arrow down"
                                    role="img">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.2">
                                        <path d="M7.5 3.5v8M10.5 8.5l-3 3-3-3"></path>
                                    </g>
                                </svg></kbd><kbd class="DocSearch-Commands-Key"><svg width="15" height="15"
                                    aria-label="Arrow up" role="img">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.2">
                                        <path d="M7.5 11.5v-8M10.5 6.5l-3-3-3 3"></path>
                                    </g>
                                </svg></kbd><span class="DocSearch-Label">to navigate</span></li>
                        <li><kbd class="DocSearch-Commands-Key"><svg width="15" height="15" aria-label="Escape key"
                                    role="img">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.2">
                                        <path
                                            d="M13.6167 8.936c-.1065.3583-.6883.962-1.4875.962-.7993 0-1.653-.9165-1.653-2.1258v-.5678c0-1.2548.7896-2.1016 1.653-2.1016.8634 0 1.3601.4778 1.4875 1.0724M9 6c-.1352-.4735-.7506-.9219-1.46-.8972-.7092.0246-1.344.57-1.344 1.2166s.4198.8812 1.3445.9805C8.465 7.3992 8.968 7.9337 9 8.5c.032.5663-.454 1.398-1.4595 1.398C6.6593 9.898 6 9 5.963 8.4851m-1.4748.5368c-.2635.5941-.8099.876-1.5443.876s-1.7073-.6248-1.7073-2.204v-.4603c0-1.0416.721-2.131 1.7073-2.131.9864 0 1.6425 1.031 1.5443 2.2492h-2.956">
                                        </path>
                                    </g>
                                </svg></kbd><span class="DocSearch-Label">to close</span></li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        let input_Filed = "#search_diaload_input";
        let link_List = "#Item_diaload_menu";
        let linklist_links ="li a";
        let selectedIndex = -1;


        var inputField = document.querySelector(input_Filed);

        // Add event listener for input focus
        inputField.addEventListener("focus", function () {
            // Add event listener for keydown
            document.addEventListener("keydown", handleKeyDown);
        });

        // Add event listener for input blur
        inputField.addEventListener("blur", function () {
            // Remove event listener for keydown
            document.removeEventListener("keydown", handleKeyDown);
            selectedIndex = -1; // Reset selectedIndex when input blurs
            updateSelection();
        });




         // Function to handle keydown events
         function handleKeyDown(event) {
            var links = document.querySelectorAll(link_List +' '+linklist_links);
            if (event.key === "ArrowDown") {
                event.preventDefault();
                selectedIndex = Math.min(selectedIndex + 1, links.length - 1);
                updateSelection();
            } else if (event.key === "ArrowUp") {
                event.preventDefault();
                selectedIndex = Math.max(selectedIndex - 1, 0);
                updateSelection();
            } else if (event.key === "Enter") {
                if (selectedIndex > -1) {
                    links[selectedIndex].click();
                }
            }

            // console.log(links);
            // console.log(selectedIndex);
        }

        function hover_items_select(){

            // Add event listener for mouseover on list items

            var links = document.querySelectorAll(link_List);
                if(links.length > 0){
                    links[0].querySelectorAll("li").forEach(function (li, index) {
                    li.addEventListener("mouseover", function () {
                        selectedIndex = index;
                        updateSelection();
                    });
                });
            }
        }


        // Function to update the selected link style

        function updateSelection() {
                var links = document.querySelectorAll(link_List +' '+linklist_links);
                if(links.length > 0){
                        links.forEach((link, index) => {
                        if (index === selectedIndex) {
                            link.classList.add("active");
                        } else {
                            link.classList.remove("active");
                        }
                    });
                }


        }

        // Select all elements with the class 'docSearch_byModel_own'
        var focus_element_detected = document.querySelectorAll('.docSearch_byModel_own');

        // Loop through each element and attach the click event listener
        focus_element_detected.forEach(function(element) {
            element.addEventListener('click', function() {
                setTimeout(function(){
                inputField.focus()
            },1000)
            });
        });

        // document.querySelector('.docSearch_byModel_own').addEventListener('click', function(){
        //     setTimeout(function(){
        //         inputField.focus()
        //     },1000)
        // })




        inputField.addEventListener('input', function(){
            if(inputField.value != '' && inputField.value != null && inputField.value.length >= 0){
                var output_element = document.querySelector('#docSearch_byModel_own .modal-body');

                output_element.innerHTML=`<div class="d-flex align-items-center gap-4 no_content justify-content-center">
                                Please Wait ...
                            </div>`;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('search_data') }}?query_data="+inputField.value, true); // Replace "your_api_endpoint_here" with your actual API endpoint
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If request is successful (status 200), populate the input field with the response
                        // inputField.value = xhr.responseText;
                        var data_response = JSON.parse(xhr.responseText);


                        var data_format= '';
                         data_format= '<ul class="list-unstyled" id="Item_diaload_menu">';
                        if(data_response.length > 0){
                            data_response.forEach((element)=>{
                               
                                    data_format+=`
                                    <li class="">
                                        <a class="text-decoration-none" href="{{url('post')}}/${element.slug.replace(/<[^>]+>/g, '')}">
                                            <i class="fa fa-code" aria-hidden="true"></i>
                                            <div>
                                                <div class="title_post">
                                                    ${element.tilte.replace(/<[^>]+>/g, '')}
                                                </div>
                                                <div class="description">
                                                    ${element.short_details.replace(/<[^>]+>/g, '')}
                                                </div>
                                            </div>
                                        </a>
                                    </li>`;
                                })
                                data_format+= '</ul>';
                                output_element.innerHTML=(data_format);
                                hover_items_select()
                        }else{
                            output_element.innerHTML=`<div class="d-flex align-items-center gap-4 no_content justify-content-center">
                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M15.5 4.8c2 3 1.7 7-1 9.7h0l4.3 4.3-4.3-4.3a7.8 7.8 0 01-9.8 1m-2.2-2.2A7.8 7.8 0 0113.2 2.4M2 18L18 2"></path></svg> No Content Found
                            </div>`;
                        }

                    } else {
                        // Handle errors here
                        console.error("Request failed with status:", xhr.status);
                    }
                }
            };
            xhr.send();
        }
        })



    });

</script>
