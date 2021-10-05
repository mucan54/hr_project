Question 1:

You are working with an existing codebase and you encounter a model structured shown in the link below. Do you feel there are any bugs or other issues in this code and if so how would you change it?

https://gist.github.com/olrandir/db60f1c6c11662da8dd8238beea6e288

BE_HR_q1.php
GitHub Gist: instantly share code, notes, and snippets.
gist.github.com


Question 2:

Many of the products Manual provides are considered prescription-only and require the customer to answer a medical history questionnaire before they can purchase them.

As part of the tech team, you are preparing for a meeting to workshop the backend model for this functionality. The requirements are the following:
1. There can be different questionnaires for different products (but one questionnaire might be reused between several products).
2. Each questionnaire can have a variable number of questions.
3. Each question can contain a variable number of answers and also of different types (for example one question might accept a free text response while another might consist of a predefined list of answer options).
4. Some questions may be triggered depending on the answer to a previous question (for example: "Have you experienced heart problems in the past?" If the answer is yes, a follow-up question is triggered to describe the problems you've experienced). 