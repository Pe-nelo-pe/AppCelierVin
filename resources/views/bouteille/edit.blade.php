@extends('layouts.app')
@section('title', 'Modifier Bouteille')
@section('content')


<a href="{{ route('bouteille.show', ['cellier' => $cellier->id, 'bouteille' => $bouteille->id]) }}" class="retour"> <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M352 115.4 331.3 96 160 256l171.3 160 20.7-19.3L201.5 256z" fill="#7e001e" class="fill-000000"></path></svg>Retour</a>

<section class="formBtl_section">


    <h1>Modifier une Bouteille</h1>

    <div>
        @if($errors)
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
    </div>

    <form x-data="{
    ismodalopen: true,
    formValues: {
        nom: '{{$bouteille->nom}}',
        prix: '{{$bouteille->prix}}',
        pays: '{{$bouteille->pays}}',
        type: '{{$bouteille->type}}',
        format: '{{$bouteille->format}}',
        cellier: '{{$bouteille->cellier}}',
        quantite: '{{$bouteille->quantite}}'
    },
    errors: {},
    validateForm() {
        event.preventDefault();
        this.errors = {};

        const requiredFields = ['nom', 'prix', 'pays', 'type', 'format'];
        const missingFields = requiredFields.filter(field => !this.formValues[field]);

        if (missingFields.length > 0) {
            this.errors.recap = 'Remplir ce champ';
            this.errors.warning = 'Champs manquant(s)';
            console.log(missingFields);
            return;
        }


        event.target.submit();
    },
    validateField(field) {
        const fieldErrors = {};
        let isValid = true;

        if (!this.formValues[field]) {
            fieldErrors[field] = `Le champ ${field} est obligatoire.`;
            <!-- console.log(fieldErrors) -->
            console.log(!this.formValues[field])
            isValid = false;
        }
        
        this.errors = {...this.errors, ...fieldErrors};
        console.log(this.errors)
        return isValid;
    },
    
  }" action="" enctype="multipart/form-data" class="formBtl_form" method="post" @submit.prevent="validateForm()">
  <!-- }" action="" enctype="multipart/form-data" class="formBtl_form" method="post"> -->
        @csrf
        @method('put')

        <label for="file" class="formBtl_ajoutL">Télécharger une image <i><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="formBtl_ajoutF"><g data-name="Layer 2"><path d="M16 29a13 13 0 1 1 13-13 13 13 0 0 1-13 13Zm0-24a11 11 0 1 0 11 11A11 11 0 0 0 16 5Z" fill="#7e001e" class="fill-000000"></path><path d="M16 23a1 1 0 0 1-1-1V10a1 1 0 0 1 2 0v12a1 1 0 0 1-1 1Z" fill="#7e001e" class="fill-000000"></path><path d="M22 17H10a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Z" fill="#7e001e" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg></i>
        </label>

        <input type="file" id="file" name="file" accept="image/*" value="{{old('file')}}" class="formBtl_file">

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="nom" type="text" name="nom" placeholder="Nom" value="{{$bouteille->nom}}"
            x-model="formValues.nom" @blur="validateField('nom')"
        >
        <span x-text="errors.nom" class="textError"></span>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="prix" type="text" name="prix"  placeholder="Prix" value="{{$bouteille->prix}}"
            x-model="formValues.prix" @blur="validateField('prix')"
        />
        <span x-text="errors.prix" class="textError"></span>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="pays" type="text" name="pays" placeholder="Pays" value="{{$bouteille->pays}}"
            x-model="formValues.pays" @blur="validateField('pays')"
        />
        <span x-text="errors.pays" class="textError"></span>


        <span x-text="errors.recap" class="textError"></span>
        <select x-ref="type" name="type" x-model="formValues.type" @blur="validateField('type')">
            <option value="Vin blanc" @if($bouteille->type == "Vin blanc") selected @endif>Vin blanc</option>
            <option value="Vin rouge" @if($bouteille->type == "Vin rouge") selected @endif>Vin rouge</option>
            <option value="Vin rosé"@if($bouteille->type == "Vin rosé") selected @endif>Vin rosé</option>
            <option value="Vin de tomate" @if($bouteille->type == "Vin de tomate") selected @endif>Vin de tomate</option>
        </select>
        <span x-text="errors.type" class="textError"></span>


        <textarea name="description" placeholder="Description" >{{$bouteille->description}}</textarea>

        <span x-text="errors.recap" class="textError"></span>
        <input x-ref="format" type="text" id="format" name="format" step="0.01" min="0" value="{{$bouteille->format}}" placeholder="Quantité (en ml)"
          x-model="formValues.format" @blur="validateField('format')"
        >
        <span x-text="errors.format" class="textError"></span>

        <input class="btn"type="submit" value="Modifier">
        
      
    </form>

    <?php
        $action = 'Supprimer cette bouteille';
      //  $routeBack = '  Route::get('cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show');';
        $route = route('bouteille.delete', ['bouteille' => $bouteille->id,'cellier' => $cellier->id]);
    ?>


    <x-modal_suppresion  route="{{ $route }}" trigger-text="Supprimer cette bouteille" >
      Etes-vous certain de vouloir {{ $action }} ?
    </x-modal_suppresion>



  


</section>
@endsection
