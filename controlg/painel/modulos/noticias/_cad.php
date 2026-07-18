<!-- Cropper.js CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<!-- Campo de upload -->
<label>Anexo:</label>
<input type="file" name="arquivo" id="anexo" class="campo_m" accept="image/*" onchange="abreAnexo(this)" />
<input type="hidden" name="imagem_cropada" id="imagem_cropada" />

<!-- Preview da imagem -->
<span id="box-anexo" class="box-anexo" style="display:none;">
  <img src="imgs/btexclui.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
  <img id="view" class="anexo-noticia" />
</span>

<!-- Modal de crop -->
<div id="modal-crop" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
     background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">
  <div style="background:#fff; padding:20px; border-radius:8px; max-width:700px; width:90%;">
    <h3 style="margin-bottom:10px;">Ajustar imagem</h3>
    <div style="max-height:450px; overflow:hidden;">
      <img id="imagem-crop" style="max-width:100%;" />
    </div>
    <div style="margin-top:15px; text-align:right; gap:10px; display:flex; justify-content:flex-end;">
      <button type="button" onclick="cancelarCrop()"
        style="padding:8px 16px; cursor:pointer;">Cancelar</button>
      <button type="button" onclick="confirmarCrop()"
        style="padding:8px 16px; background:#2e7d32; color:#fff; border:none; 
                       border-radius:4px; cursor:pointer;">Confirmar corte</button>
    </div>
  </div>
</div>
<script src="js/cropper.js"></script>