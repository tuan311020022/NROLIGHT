<template>
    <div class="background1">
        <img class="Back" src="../../assets/back.jpg" alt="error">
        <div class="Check-Contain">
            <div class="Led">
                
            </div>
            <div class="Check-Body">
                <h2 class="Text">vui lòng check thông tin thẻ tới khi hiện thẻ đúng</h2>
                <div class="Input">
                    <div class="Name">
                        {{ this.Name}}
                    </div>
                </div>
                <div class="Input">
                    <div class="Name">
                        {{ this.Type}}
                    </div>
                </div>
                <div class="Input">
                    <div class="Name">
                        {{ this.Mount}}
                    </div>
                </div>
                <div class="Input">
                    <div class="Name">
                        {{ this.Status}}
                    </div>
                </div>
                <button class="btn btn-light btn-lg" type="submit" @click="Check()">Check</button>
            </div>
        </div>
    </div>
</template>
<style scoped src ="./CheckBody.css"/>
<script src="./CheckBody.js"></script>