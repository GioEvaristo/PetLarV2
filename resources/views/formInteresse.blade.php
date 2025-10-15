<section class="filtro">
         @php
             $telefone = [];
             $endereco = [];
             $motivacao = [];
             $infoadicional = [];
</section>


<div>
   <div>
       <text>Formulário de Interesse em Adotar</text>
   </div>
   <div>
       <div>
           <img src="{{ asset('storage/images/' . $animal['img']) }}" alt="{{ $animal['nome'] }}">
           <p class="nome">{{ $animal['nome'] }}</p>  /* eu n soube fazer pegar da outra pagina, ent aq deve dar erro.  adotar>perfilAnimal!(nome)>formInteresse(nome)*/
       </div> /*acho q o nome ou id do animal vai ser imp p fazer foreign key ou sla, p linkar os interessados ao pet */
       <div class="logo">
               <a href="/"><img src="{{ asset('storage/images/logo.png') }}" alt="PetLar Logo"></a>
       </div>
   </div>
   <div>
       <form action="{{ route('adotar') }}" method="POST" enctype="multipart/form-data">


       @csrf
          
           <div>
               <label for="telefone">Telefone de Contato (Whatsapp)*</label>
               <input type="text" id="telefone" name="telefone">
           </div>
           <div>
               <label for="endereco">Endereço*</label>
               <input type="text" id="endereco" name="endereco">
           </div>
           <div>
               <label for="motivacao">Por que deseja adotar esse animal?*</label>
               <input type="text" id="motivacao" name="motivacao">
           </div>
           <div>
               <label for="infoadicional">Informações adicionais</label>
               <input type="text" id="infoadicional" name="infoadicional">
           </div>


           <div>
               <button type="submit">ENVIAR</button>
           </div>
       </form>
   </div>
</div>


