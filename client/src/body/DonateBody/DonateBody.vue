<template>
    <div class="Back">
        <div class="Container">
            <div class="Board">
                <h2>
                    Nạp thẻ
                </h2>
                <div class="form-floating mb-3 Input">
                    <div class="Name">
                        {{ this.Name}}
                    </div>
                </div>
                <select v-model="Type" class="form-select form-select-lg mb-3 Input" aria-label=".form-select-lg example" >
                    <option value="" selected>Loại thẻ</option>
                    <option value="VIETTEL">Viettel</option>
                    <option value="MOBIFONE">MobiFone</option>
                    <option value="VINAPHONE">VinaPhone</option>
                    <option value="GATE">Gate</option>
                    <option value="ZING">Zing</option>
                </select>
                <select v-model="Mount" class="form-select form-select-lg mb-3 Input" aria-label=".form-select-lg example">
                    <option value="" selected>Mệnh giá</option>
                    <option value="10000">10.000</option>
                    <option value="20000">20.000</option>
                    <option value="30000">30.000</option>
                    <option value="50000">50.000</option>
                    <option value="100000">100.000</option>
                    <option value="200000">200.000</option>
                    <option value="300000">300.000</option>
                    <option value="500000">500.000</option>
                </select>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.Code" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Mã thẻ</label>
                </div>
                <div class="form-floating mb-3 Input">
                    <input v-model="this.Series" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Số series</label>
                </div>
                <button class="btn btn-light btn-lg" type="submit" @click="Donate()">Nạp</button>
            </div>
        </div>
    </div>
</template>
<style scoped src ="./DonateBody.css"/>
<script src="./DonateBody.js"></script>