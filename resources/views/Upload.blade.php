<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .hasImage:hover section {
      background-color: rgba(5, 5, 5, 0.4);
    }
    .hasImage:hover button:hover {
      background: rgba(5, 5, 5, 0.45);
    }
    
    #overlay p,
    i {
      opacity: 0;
    }
    
    #overlay.draggedover {
      background-color: rgba(255, 255, 255, 0.7);
    }
    #overlay.draggedover p,
    #overlay.draggedover i {
      opacity: 1;
    }
    
    .group:hover .group-hover\:text-blue-800 {
      color: #2b6cb0;
    }
    </style>
<x-app-layout>
    @if(session('success'))
    <div class="relative" id="notif" hidden>
        <div class='fixed right-0 top-1 z-50 flex items-center text-white max-w-sm w-full bg-green-400 shadow-md rounded-lg overflow-hidden'>{{--  transition delay-1000 duration-1000 ease-in-out transform translate-y-28 --}}
            <div class='w-10 border-r px-2'>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
            </div>

            <div class='flex items-center px-2 py-3'>
                <div class='mx-3'>
                    <p> {{ session('success') }} </p>
                </div>
            </div>
        </div>
    </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload files') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="py-4">
                        @php
                            $downloads = App\Models\Download::all();
                        @endphp
                    </ul>
                    <div class="flex flex-col text-left">
                        <div>
                            <div>
                                <div>
                                    <div class="text-center">
 
                                        {{-- <form name="save-multiple-files" method="POST"  action="{{ url('save-multiple-files') }}" accept-charset="utf-8" enctype="multipart/form-data">
                                 
                                          @csrf
                                            <div class="row">
                                 
                                                <div class="col-md-12">
                                                        <div class="input_field flex flex-col w-max mx-auto text-center">
                                                            <label>
                                                                <input class="text-sm cursor-pointer w-36 hidden" name="files[]" type="file" multiple>
                                                                <div class="text bg-indigo-600 text-white border border-gray-300 rounded font-semibold cursor-pointer p-1 px-3 hover:bg-indigo-500">Choose File(s)</div>
                                                            </label>    
                                                            </div>
                                                            @error('files')
                                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                            @enderror
                                                </div>
                                                   
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                                </div>
                                            </div>     
                                        </form> --}}
                                        {{-- <form method="post" name="save-multiple-files" action="{{ url('save-multiple-files') }}" enctype="multipart/form-data">
                                            @csrf
                                          
                                            <div class="input-group hdtuto control-group lst increment" >
                                              <input type="file" name="file[]" class="myfrm form-control">
                                              <div class="input-group-btn"> 
                                                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                              </div>
                                            </div>
                                            <div class="clone hide">
                                              <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                <input type="file" name="file[]" class="myfrm form-control">
                                                <div class="input-group-btn"> 
                                                  <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                              </div>
                                            </div>
                                          
                                            <button type="submit" class="btn btn-success" style="margin-top:10px">Upload!</button>
                                          
                                        </form>  --}}
                                        <form name="save-multiple-files" method="POST"  action="{{ url('save-multiple-files') }}" accept-charset="utf-8" enctype="multipart/form-data">
                                            @csrf
                                        <div class="">
                                            <main class="container mx-auto max-w-screen-lg h-full">
                                              <!-- file upload modal -->
                                              <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                                      
                                                <!-- scroll area -->
                                                <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                                                  <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                                    <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                                      <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                                    </p>
                                                    <input id="hidden-input" type="file" name="files[]" multiple class="hidden" />
                                                    <button id="button" type="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                                      Upload a file
                                                    </button>
                                                  </header>
                                      
                                                  <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                                    To Upload
                                                  </h1>
                                      
                                                  <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                                    <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                                      <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                                      <span class="text-small text-gray-500">No files selected</span>
                                                    </li>
                                                  </ul>
                                                </section>
                                      
                                                <!-- sticky footer -->
                                                <footer class="flex justify-end px-8 pb-8 pt-4">
                                                  <button id="submit" id="submit" class="rounded-sm px-3 py-1 bg-blue-700 hover:bg-blue-500 text-white focus:shadow-outline focus:outline-none">
                                                    Upload now
                                                  </button>
                                                  <button id="cancel" type="button" class="ml-3 rounded-sm px-3 py-1 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                                    Cancel
                                                  </button>
                                                </footer>
                                              </article>
                                            </main>
                                          </div>
                                      
                                          <!-- using two similar templates for simplicity in js code -->
                                          <template id="file-template">
                                            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                              <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                                                <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />
                                      
                                                <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                  <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                                  <div class="flex">
                                                    <span class="p-1 text-blue-800">
                                                      <i>
                                                        <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                          <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                                        </svg>
                                                      </i>
                                                    </span>
                                                    <p class="p-1 size text-xs text-gray-700"></p>
                                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                                      <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                      </svg>
                                                    </button>
                                                  </div>
                                                </section>
                                              </article>
                                            </li>
                                          </template>
                                      
                                          <template id="image-template">
                                            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                              <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                                <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />
                                      
                                                <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                  <h1 class="flex-1"></h1>
                                                  <div class="flex">
                                                    <span class="p-1">
                                                      <i>
                                                        <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                          <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                                        </svg>
                                                      </i>
                                                    </span>
                                      
                                                    <p class="p-1 size text-xs"></p>
                                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                      <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                                      </svg>
                                                    </button>
                                                  </div>
                                                </section>
                                              </article>
                                            </li>
                                          </template>
                                    
                                        </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
/*     function AddDownload($id) {
        let $status = $("#" + $id).is(":checked");
        $id = $id.replace("checkbox", "");
        if ($status) {
            $.ajax({
                type: "POST",
                url: "{{ url('addDownload') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": "",
                    "download_id": $id
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "{{ url('removeDownload') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": "",
                    "download_id": $id
                }
            });
        }
    } */
</script>
<script>
const fileTempl = document.getElementById("file-template"),
  imageTempl = document.getElementById("image-template"),
  empty = document.getElementById("empty");

// use to store pre selected files
let FILES = {};

// check if file is of type image and prepend the initialied
// template to the target element
function addFile(target, file) {
  const isImage = file.type.match("image.*"),
    objectURL = URL.createObjectURL(file);

  const clone = isImage
    ? imageTempl.content.cloneNode(true)
    : fileTempl.content.cloneNode(true);

  clone.querySelector("h1").textContent = file.name;
  clone.querySelector("li").id = objectURL;
  clone.querySelector(".delete").dataset.target = objectURL;
  clone.querySelector(".size").textContent =
    file.size > 1024
      ? file.size > 1048576
        ? Math.round(file.size / 1048576) + "mb"
        : Math.round(file.size / 1024) + "kb"
      : file.size + "b";

  isImage &&
    Object.assign(clone.querySelector("img"), {
      src: objectURL,
      alt: file.name
    });

  empty.classList.add("hidden");
  target.prepend(clone);

  FILES[objectURL] = file;
}

const gallery = document.getElementById("gallery"),
  overlay = document.getElementById("overlay");

// click the hidden input of type file if the visible button is clicked
// and capture the selected files
const hidden = document.getElementById("hidden-input");
document.getElementById("button").onclick = () => hidden.click();
hidden.onchange = (e) => {
  for (const file of e.target.files) {
    addFile(gallery, file);
  }
};

// use to check if a file is being dragged
const hasFiles = ({ dataTransfer: { types = [] } }) =>
  types.indexOf("Files") > -1;

// use to drag dragenter and dragleave events.
// this is to know if the outermost parent is dragged over
// without issues due to drag events on its children
let counter = 0;

// reset counter and append file to gallery when file is dropped
function dropHandler(ev) {
  ev.preventDefault();
  for (const file of ev.dataTransfer.files) {
    addFile(gallery, file);
    overlay.classList.remove("draggedover");
    counter = 0;
  }
}

// only react to actual files being dragged
function dragEnterHandler(e) {
  e.preventDefault();
  if (!hasFiles(e)) {
    return;
  }
  ++counter && overlay.classList.add("draggedover");
}

function dragLeaveHandler(e) {
  1 > --counter && overlay.classList.remove("draggedover");
}

function dragOverHandler(e) {
  if (hasFiles(e)) {
    e.preventDefault();
  }
}

// event delegation to caputre delete events
// fron the waste buckets in the file preview cards
gallery.onclick = ({ target }) => {
  if (target.classList.contains("delete")) {
    const ou = target.dataset.target;
    document.getElementById(ou).remove(ou);
    gallery.children.length === 1 && empty.classList.remove("hidden");
    delete FILES[ou];
  }
};

// print all selected files
document.getElementById("submit").onclick = () => {
  //alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
  console.log(FILES);
};

// clear entire selection
document.getElementById("cancel").onclick = () => {
  while (gallery.children.length > 0) {
    gallery.lastChild.remove();
  }
  FILES = {};
  empty.classList.remove("hidden");
  gallery.append(empty);
};

$(document).ready(function(){
    $("#notif").fadeIn(500, function(){
        setTimeout(function(){
            $("#notif").fadeOut(500);
        },3000);
        
    });
});
</script>

