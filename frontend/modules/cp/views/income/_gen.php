<tr data-key="<?= $key ?>">
    <td>
        <div class="form-group field-incomeproducts-<?= $key ?>-product_id">

            <select id="incomeproducts-<?= $key ?>-product_id" class="form-control select2<?= $key ?>" onchange="setSerial(this,<?= $key?>)"
                    name="IncomeProducts[<?= $key ?>][product_id]">
                <option value="">Mahsulotni tanlang</option>
                <?php foreach (\frontend\components\GetArray::Product() as $k=>$item) :?>
                    <option value="<?= $k?>"><?= $item?></option>
                <?php endforeach;?>
            </select>
        </div>
    </td>
    <td>
        <div class="form-group field-incomeproducts-<?= $key?>-serial">

            <input type="text" id="incomeproducts-<?= $key?>-serial" class="form-control" name="IncomeProducts[<?= $key?>][serial]">

        </div>
    </td>
    <td>
        <div class="form-group field-incomeproducts-<?= $key?>-exp_date">

            <input type="date" id="incomeproducts-<?= $key?>-exp_date" class="form-control" name="IncomeProducts[<?= $key?>][exp_date]">

        </div>
    </td>
    <td>
        <div class="form-group field-incomeproducts-<?= $key?>-count">

            <input type="text" id="incomeproducts-<?= $key?>-count" class="form-control" name="IncomeProducts[<?= $key?>][count]">

        </div>
    </td>
    <td>
        <div class="form-group field-incomeproducts-<?= $key?>-box">

            <input type="text" id="incomeproducts-<?= $key?>-box" class="form-control" name="IncomeProducts[<?= $key?>][box]">

        </div>
    </td>
    <td>
        <div class="form-group field-incomeproducts-<?= $key?>-price">

            <input type="text" id="incomeproducts-<?= $key?>-price" class="form-control" name="IncomeProducts[<?= $key?>][price]">

        </div>
    </td>
    <td>
        <div class="form-group field-incomeproducts-<?= $key?>-amout">

            <input type="text" id="incomeproducts-<?= $key?>-amout" class="form-control" name="IncomeProducts[<?= $key?>][amout]">

        </div>
    </td>
    <td>
        <button onclick="remover(<?= $key ?>)" type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button>
    </td>
</tr>