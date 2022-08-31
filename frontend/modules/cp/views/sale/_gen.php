<tr data-key="<?= $key ?>">
    <td>
        <div class="form-group field-saleproducts-<?= $key ?>-product_id">

            <select id="saleproducts-<?= $key ?>-product_id" class="form-control select2<?= $key ?>" onchange="setSerial(this,<?= $key?>)"
                    name="SaleProducts[<?= $key ?>][product_id]">
                <option value="">Mahsulotni tanlang</option>
                <?php foreach (\frontend\components\GetArray::Product() as $k=>$item) :?>
                    <option value="<?= $k?>"><?= $item?></option>
                <?php endforeach;?>
            </select>
        </div>
    </td>
    <td>
        <div class="form-group field-saleproducts-<?= $key?>-serial">

            <input type="text" id="saleproducts-<?= $key?>-serial" class="form-control" name="SaleProducts[<?= $key?>][serial]">

        </div>
    </td>

    <td>
        <div class="form-group field-saleproducts-<?= $key?>-count">

            <input type="text" id="saleproducts-<?= $key?>-count" class="form-control" name="SaleProducts[<?= $key?>][count]">

        </div>
    </td>
    <td>
        <div class="form-group field-saleproducts-<?= $key?>-box">

            <input type="text" id="saleproducts-<?= $key?>-box" class="form-control" name="SaleProducts[<?= $key?>][box]">

        </div>
    </td>
    <td>
        <div class="form-group field-saleproducts-<?= $key?>-price">

            <input type="text" id="saleproducts-<?= $key?>-price" class="form-control" name="SaleProducts[<?= $key?>][price]">

        </div>
    </td>
    <td>
        <div class="form-group field-saleproducts-<?= $key?>-amout">

            <input type="text" id="saleproducts-<?= $key?>-amout" class="form-control" name="SaleProducts[<?= $key?>][amout]">

        </div>
    </td>
    <td>
        <button onclick="remover(<?= $key ?>)" type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button>
    </td>
</tr>