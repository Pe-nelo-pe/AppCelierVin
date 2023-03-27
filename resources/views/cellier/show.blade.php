
@extends('layouts.app')
@section('title', 'Cellier')
@section('content')



   

<div class="liste-btl_body">
    <div class="liste-btl_title">
         <h1>Cellier : {{$cellier->nom}}</h1> 
         <a href="{{ route('cellier.edit', $cellier->id)}}" title="Modifier cellier"><svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="#7e001e" fill-rule="evenodd" class="fill-000000"></path></svg></a> 
    </div>

    {{-- <div class="liste-btl_liste"> --}}

        {{--@forelse($bouteilles as $bouteille)
        <div class="liste-btl_carte">
            <div class="liste-btl_img">
            @isset($bouteille->image)
                @isset($bouteille->code_saq)
                <img src="{{$bouteille->image}}" alt="{{$bouteille->nom}}" class="saq">
                @else
                <img src="{{asset('storage/uploads/'.$bouteille->image)}}" alt="{{$bouteille->nom}}" > 

                @endisset
            @else
                <img src="{{asset('assets/img/icon_PW2/btl-alt_maison.svg')}}" alt="{{$bouteille->nom}}" class="liste-btl_img_alt">

            @endisset
            </div>
         
            <div class="liste-btl_info">
                <div class="liste-btl_info_header">
                    <div>
                        <p>{{$bouteille->pays}}</p>
                    </div>
                    <div>
                        <p>  {{$bouteille->type}}  </p>
                    </div>
                    <div>
                        <p>{{$bouteille->format}} </p>
                    </div>
                    
                </div>
               
                    <h1><a href="{{route('bouteille.show', [$cellier->id, $bouteille->id]) }}">{{$bouteille->nom}}</a></h1>
               
            </div>

            <div class="liste-btl_info_actions">
                <!--<p>4/5</p>
                <div>
                
                    <!--<button>-</button>
                    <input type="number" value="{{$bouteille->qte}}">
                    <!--<button>+</button>
                </div>
            </div>
        </div>
        @empty
        <div>Aucune bouteille dans le cellier</div>
        @endforelse
         -->

           @forelse($bouteilles as $bouteille)
        <div class="liste-btl_carte">
           
            <div class="liste-btl_tete">
                <div class="liste-btl_tete_pays">
                    <svg enable-background="new 0 0 48 48" height="48px" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Expanded"><g><g><path d="M22.007,35c-9.374,0-17-7.626-17-17s7.626-17,17-17s17,7.626,17,17S31.381,35,22.007,35z M22.007,3     c-8.271,0-15,6.729-15,15s6.729,15,15,15s15-6.729,15-15S30.278,3,22.007,3z"/></g><g><path d="M22.007,39.99c-5.634,0-11.268-2.145-15.557-6.433l1.414-1.414c7.799,7.797,20.487,7.798,28.284,0     c7.798-7.798,7.798-20.487,0-28.285l1.414-1.414c8.578,8.578,8.578,22.535,0,31.113C33.274,37.845,27.641,39.99,22.007,39.99z"/></g><g><rect height="4.05" width="2" x="20.007" y="38.976"/></g><g><rect height="4.05" width="2" x="22.007" y="38.976"/></g><g><path d="M36.973,48H7.04l2.403-1.8c3.668-2.748,8.013-4.2,12.563-4.2s8.895,1.452,12.562,4.2L36.973,48z M13.547,46h16.92     c-2.617-1.315-5.49-2-8.46-2S16.163,44.685,13.547,46z"/></g><g><path d="M5.743,35.264c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828     c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L6.45,34.971C6.255,35.166,5.999,35.264,5.743,35.264z"/></g><g><path d="M35.441,5.565c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828     c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414l-2.828,2.828C35.953,5.468,35.697,5.565,35.441,5.565z"/></g></g></g></svg>
                    <p>{{$bouteille->pays}}</p>
                </div>                   
                <span class="liste-btl_info_etoile">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="
                        @if($i <= $bouteille->note)
                        note_jaune
                        @else
                        note_vide
                        @endif
                        " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    @endfor
                </span>
                        
                       
            </div>

            <div class="liste-btl_corps">
                <div class="liste-btl_img">
                @isset($bouteille->image)
                    @isset($bouteille->code_saq)
                    <img src="{{$bouteille->image}}" alt="{{$bouteille->nom}}" class="saq">
                    @else
                    <img src="{{asset('storage/uploads/'.$bouteille->image)}}" alt="{{$bouteille->nom}}" > 

                    @endisset
                @else
                    <img src="{{ asset('assets/img/icon_PW2/btl-alt_maison.svg') }}" alt="{{$bouteille->nom}}" class="liste-btl_img_alt">
                @endisset
                </div>
                <div class="liste-btl_info">
                   <div  class="liste-btl_info_nom">
                       <a href="{{route('bouteille.show', [$cellier->id, $bouteille->id]) }}"><strong>
                           {{$bouteille->nom}}
                        </strong> <small> {{$bouteille->type}} - {{$bouteille->format}} ml</small></a>
                    </div>
                    
                    <x-quantite :bouteille="$bouteille" :cellier="$cellier"/>
                
                </div>
            </div>
        </div>
        @empty
        <div>Aucune bouteille dans le cellier</div>
        @endforelse --}}

        <section x-data="{ items: {{$bouteilles}} }" class="liste-btl_liste">
            <div>
                <p>Assortir par :</p>
                <button @click="assortir(items, 'nom')">Nom</button>
                <button @click="assortir(items, 'pays')">Pays</button>
                <button @click="assortir(items, 'type')">Type</button>
                <button @click="assortir(items, 'note')">Note</button>
            </div>
        
            <template x-if="items == ''">
                <div>Aucune bouteille dans le cellier</div>
            </template>
    
            <template x-for="(item, cle) in items">
                <article class="liste-btl_carte">
                    <div class="liste-btl_tete">
                        <div class="liste-btl_tete_pays">
                            <svg enable-background="new 0 0 48 48" height="48px" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Expanded"><g><g><path d="M22.007,35c-9.374,0-17-7.626-17-17s7.626-17,17-17s17,7.626,17,17S31.381,35,22.007,35z M22.007,3     c-8.271,0-15,6.729-15,15s6.729,15,15,15s15-6.729,15-15S30.278,3,22.007,3z"/></g><g><path d="M22.007,39.99c-5.634,0-11.268-2.145-15.557-6.433l1.414-1.414c7.799,7.797,20.487,7.798,28.284,0     c7.798-7.798,7.798-20.487,0-28.285l1.414-1.414c8.578,8.578,8.578,22.535,0,31.113C33.274,37.845,27.641,39.99,22.007,39.99z"/></g><g><rect height="4.05" width="2" x="20.007" y="38.976"/></g><g><rect height="4.05" width="2" x="22.007" y="38.976"/></g><g><path d="M36.973,48H7.04l2.403-1.8c3.668-2.748,8.013-4.2,12.563-4.2s8.895,1.452,12.562,4.2L36.973,48z M13.547,46h16.92     c-2.617-1.315-5.49-2-8.46-2S16.163,44.685,13.547,46z"/></g><g><path d="M5.743,35.264c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828     c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L6.45,34.971C6.255,35.166,5.999,35.264,5.743,35.264z"/></g><g><path d="M35.441,5.565c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.828-2.828     c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414l-2.828,2.828C35.953,5.468,35.697,5.565,35.441,5.565z"/></g></g></g></svg>
                            <p x-text="item.pays"></p>
                        </div>                   
                        <span class="liste-btl_info_etoile">
                            @for($i = 1; $i <= 5; $i++)
                            <svg :class="{'note_jaune': {{$i}} <= item.note, 'note_vide': {{$i}} > item.note}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            @endfor
                        </span>                       
                    </div>

                    <div class="liste-btl_corps">
                        <div class="liste-btl_img">
                            <template x-if="item.code_saq != null && item.image != null">
                                <img x-bind:src="item.image" x-bind:alt="item.nom" class="saq">
                            </template>
                            <template x-if="item.code_saq == null && item.image != null">
                                <img x-bind:src="'{{asset('storage/uploads')}}'+'/'+ item.image" x-bind:alt="item.nom" >
                            </template>
                            <template x-if="item.code_saq == null && item.image == null">
                                <img src="{{asset('assets/img/icon_PW2/btl-alt_maison.svg')}}" x-bind:alt="item.nom" class="liste-btl_img_alt">
                            </template>
                        </div>
                        <div class="liste-btl_info">
                           <div  class="liste-btl_info_nom">
                                <a :href="`{{route('bouteille.show', [$cellier->id, ''])}}/${item.id}`">
                                    <strong x-text="item.nom"></strong> 
                                    <small x-text="item.type"></small>
                                    <small> - </small>
                                    <small x-text="item.format"></small>
                                    <small> ml</small>
                                </a>
                            </div>

                            {{-- Avec l'utilisation de Alpine.js pour Sort() et de Laravel, la syntaxe a employé limite la manière de faire les choses. Dans le cas que la composante Quantite doit être usé avec un object contenant les informations de `item` provenant d'alpine `x-data`, `item` n'est pas un objet transferable dans la composante donc il doit être créé manuellement avec les informations de $bouteilles. `item` ne peut pas non plus être mis dans une variable pour php puisque c'est du JSON front-end. --}}
                            {{-- Cette boucle est trop exigeante sur des grosses liste --}}
                            {{-- @forelse($bouteilles as $bouteille)
                            <template x-if="item.nom.toString() == `{{$bouteille->nom}}`">
                                @php
                                $item = (object)array('qte' => $bouteille->qte, 'id' => $bouteille->id);
                                @endphp
                                <x-quantite :bouteille="$item" :cellier="$cellier"/>
                            </template>
                            @empty
                            @endforelse --}}
                            {{-- Malheureusement, 
                                https://gist.github.com/jasonlbeggs/1341e7367c0dc69ac64ef2140d0f0591
                                ne semble pas fonctionner. --}}
                            {{-- <x-quantite ::bouteille="item" :cellier="$cellier"/> --}}
                            <form  class="liste-btl_info_bouteilles" x-data="{counter : item.qte, idB : item.id, idC : {{$cellier->id}} }" x-on:change="changeQte" title="Change quantité de bouteille" onsubmit="return false">
                                <button @click="counter--; if(counter <0){counter = 0}" x-on:click="changeQte" aria-label="Enlever quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
                            
                                <input type="number" x-on:change="changeQte" x-model.number="counter" min="0" aria-label="Quantité">
                                                   
                                <button @click="counter++" x-on:click="changeQte" aria-label="Ajouter quantité"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></button>
                            </form>
                        </div>
                    </div>
                </article>
            </template>
        </section>
    </div>   
</div>

<div>
    <x-notification ></x-notification>
</div>
@endsection