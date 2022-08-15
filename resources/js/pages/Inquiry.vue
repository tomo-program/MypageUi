<template>
  <div>
    <Layout></Layout>
    <v-col cols="12">
      <div class="content">
        <Header :title="title" :icon="icon" />
        <v-form @submit.prevent="login" ref="formValidate">
          <div>
            <v-container  class="inquiryContainer text-center">
              <v-text-field
                label="名前"
                :rules="[rules.required, rules.counter]"
                v-model="form.name"
              ></v-text-field>
              <v-text-field
                label="タイトル"
                :rules="[rules.required, rules.counter]"
                :v-model="form.title"
              ></v-text-field>

              <v-textarea
                name="input-7-1"
                filled
                label="内容"
                :rules="[rules.required]"
                :v-model="form.contents"
                auto-grow
              ></v-textarea>
              <v-btn type="submit" rounded color="black">送信する</v-btn>
              
            </v-container>
          </div>
        </v-form>
      </div>
    </v-col>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import Header from "../gloval/Header.vue";
import Layout from "../layout/Layout.vue";
import BaseButton from "../components/atom/button/BaseButton.vue";

const form = ref({
  name: "",
  title: "",
  contents: "",
});
const name = "Inquiry";
const title = "Inquiry";
const icon = "mdi-chat-question";
const rules = {
  required: (value: string | number) => !!value || "必須項目です。",
  counter: (value: String) => value.length <= 20 || "20字以内で入力してください。",
  email: (value: string) => {
    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(value) || "Invalid e-mail.";
  },
};

const buttonContents = "送信する";
const formValidate = ref();
const login = async () => {
  const validResult = await formValidate.value.validate();
  if (!validResult.valid) {
    // console.log("バリデーション処理");
    // console.log(validResult);
    // console.log(validResult.valid);
    return;
  }
  console.log("バリデーション通過");
};
</script>

<style></style>
