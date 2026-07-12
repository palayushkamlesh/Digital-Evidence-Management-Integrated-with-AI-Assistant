<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AI Investigator Assistant</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #0b1220;
      color: #fff;
    }

    .app {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 24px;
      padding: 32px;
      align-items: center;
    }

    .stage {
      min-height: 520px;
      border-radius: 28px;
      background: linear-gradient(180deg, #0f1e4f 0%, #10285f 55%, #0b1940 100%);
      position: relative;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0,0,0,0.35);
    }

    .scene {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .robot-scene {
      position: relative;
      width: 360px;
      height: 380px;
    }

    .speech-bubble {
      position: absolute;
      left: 18px;
      top: 72px;
      width: 104px;
      height: 88px;
      background: #f6f7fb;
      border-radius: 24px;
      box-shadow:
        0 16px 30px rgba(0,0,0,0.16),
        inset -6px -8px 0 rgba(0,0,0,0.05),
        inset 5px 5px 0 rgba(255,255,255,0.7);
      animation: bubbleFloat 4s ease-in-out infinite;
    }

    .speech-bubble::after {
      content: "";
      position: absolute;
      right: 16px;
      bottom: -8px;
      width: 18px;
      height: 18px;
      background: #f6f7fb;
      clip-path: polygon(0 0, 100% 0, 25% 100%);
      transform: rotate(16deg);
    }

    .bubble-line {
      height: 10px;
      border-radius: 999px;
      margin: 14px 18px 0;
      background: #dfe4ea;
    }

    .bubble-line.short {
      width: 54px;
    }

    .bubble-line.blue {
      width: 52px;
      background: #62bbff;
    }

    .shadow {
      position: absolute;
      bottom: 30px;
      left: 122px;
      width: 126px;
      height: 18px;
      background: rgba(0,0,0,0.24);
      border-radius: 999px;
      filter: blur(8px);
      animation: shadowPulse 4.8s ease-in-out infinite;
    }

    .robot {
      position: absolute;
      left: 96px;
      top: 46px;
      width: 168px;
      height: 255px;
      animation: float 4.8s ease-in-out infinite;
    }

    .head {
      position: absolute;
      left: 12px;
      top: 0;
      width: 144px;
      height: 114px;
      background: #f6f7fb;
      border-radius: 48px;
      box-shadow:
        inset -8px -10px 0 rgba(0,0,0,.06),
        inset 8px 8px 0 rgba(255,255,255,.75);
      z-index: 4;
    }

    .head::before {
      content: "";
      position: absolute;
      top: -8px;
      left: 46px;
      width: 54px;
      height: 22px;
      background: #eef1f7;
      border-radius: 999px;
      box-shadow: inset 0 -4px 0 rgba(0,0,0,.05);
    }

    .ear {
      position: absolute;
      top: 38px;
      width: 24px;
      height: 42px;
      background: #f1f3f8;
      border-radius: 18px;
      box-shadow: inset -4px -4px 0 rgba(0,0,0,.05);
    }

    .ear.left {
      left: -8px;
    }

    .ear.right {
      right: -8px;
    }

    .visor {
      position: absolute;
      left: 25px;
      top: 22px;
      width: 94px;
      height: 60px;
      background: #20232c;
      border-radius: 24px;
      overflow: hidden;
      box-shadow:
        inset 0 0 0 3px rgba(255,255,255,.04),
        inset 0 -6px 10px rgba(0,0,0,.25);
    }

    .visor::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(255,255,255,.12), rgba(255,255,255,0) 40%);
    }

    .eye {
      position: absolute;
      top: 18px;
      width: 16px;
      height: 22px;
      border-radius: 999px;
      background: #5fe6ff;
      box-shadow: 0 0 18px rgba(95,230,255,.95);
      animation: blink 5.2s infinite;
    }

    .eye.left {
      left: 24px;
    }

    .eye.right {
      right: 24px;
    }

    .neck {
      position: absolute;
      left: 64px;
      top: 108px;
      width: 40px;
      height: 12px;
      background: #2f3138;
      border-radius: 0 0 10px 10px;
      z-index: 2;
    }

    .torso {
      position: absolute;
      left: 24px;
      top: 114px;
      width: 120px;
      height: 122px;
      background: #f7f8fb;
      border-radius: 48px 48px 58px 58px;
      box-shadow:
        inset -8px -10px 0 rgba(0,0,0,.06),
        inset 8px 8px 0 rgba(255,255,255,.75);
      z-index: 1;
    }

    .torso::after {
      content: "";
      position: absolute;
      left: 24px;
      right: 24px;
      bottom: 20px;
      height: 10px;
      border-bottom: 2px solid rgba(0,0,0,.12);
      border-radius: 0 0 999px 999px;
    }

    .arm {
      position: absolute;
      top: 138px;
      width: 34px;
      height: 98px;
      background: #f5f6fa;
      border-radius: 26px;
      box-shadow:
        inset -6px -8px 0 rgba(0,0,0,.05),
        inset 5px 5px 0 rgba(255,255,255,.75);
      transform-origin: top center;
      z-index: 0;
    }

    .arm.left {
      left: -4px;
      transform: rotate(16deg);
    }

    .arm.right {
      right: -4px;
      transform: rotate(-16deg);
    }

    .talking .head {
      animation: headTalk .9s ease-in-out infinite;
    }

    .talking .arm.left {
      animation: armTalkL .9s ease-in-out infinite;
    }

    .talking .arm.right {
      animation: armTalkR .9s ease-in-out infinite;
    }

    .talking .speech-bubble {
      animation: bubbleTalk .9s ease-in-out infinite;
    }

    .talking .eye {
      animation: talkEye .9s ease-in-out infinite, blink 5.2s infinite;
    }

    .panel {
      background: #ffffff;
      color: #101828;
      border-radius: 24px;
      padding: 24px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.25);
    }

    .eyebrow {
      font-size: 12px;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #667085;
      margin-bottom: 10px;
    }

    h1 {
      margin: 0 0 10px;
      font-size: 32px;
      line-height: 1.1;
      color: #101828;
    }

    .sub {
      margin: 0 0 18px;
      color: #475467;
      line-height: 1.6;
    }

    .controls {
      display: flex;
      gap: 12px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    button {
      border: none;
      border-radius: 12px;
      padding: 12px 18px;
      font-size: 14px;
      cursor: pointer;
      transition: transform .15s ease, opacity .15s ease;
    }

    button:hover {
      transform: translateY(-1px);
    }

    .primary {
      background: #1279ff;
      color: #fff;
    }

    .secondary {
      background: #eef2f6;
      color: #101828;
    }

    textarea {
      width: 100%;
      min-height: 140px;
      resize: vertical;
      padding: 14px 16px;
      border-radius: 16px;
      border: 1px solid #d0d5dd;
      outline: none;
      font-size: 15px;
      line-height: 1.5;
      margin-bottom: 16px;
      font-family: Arial, sans-serif;
    }

    textarea:focus {
      border-color: #1279ff;
      box-shadow: 0 0 0 4px rgba(18,121,255,0.12);
    }

    #result {
      margin-top: 18px;
      padding: 20px;
      border: 1px solid #e4e7ec;
      border-radius: 18px;
      min-height: 140px;
      background: #f8fafc;
      color: #344054;
      line-height: 1.6;
    }

    .wave {
      display: flex;
      gap: 6px;
      align-items: flex-end;
      margin: 14px 0 18px;
    }

    .wave span {
      width: 8px;
      border-radius: 999px;
      background: #1279ff;
      animation: wave 0.9s infinite ease-in-out;
    }

    .wave span:nth-child(1) { height: 14px; animation-delay: 0s; }
    .wave span:nth-child(2) { height: 24px; animation-delay: .15s; }
    .wave span:nth-child(3) { height: 12px; animation-delay: .3s; }
    .wave span:nth-child(4) { height: 20px; animation-delay: .45s; }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-12px); }
    }

    @keyframes bubbleFloat {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }

    @keyframes shadowPulse {
      0%, 100% { transform: scaleX(1); opacity: .22; }
      50% { transform: scaleX(.88); opacity: .14; }
    }

    @keyframes blink {
      0%, 46%, 52%, 100% { transform: scaleY(1); }
      48%, 50% { transform: scaleY(.12); }
    }

    @keyframes headTalk {
      0%, 100% { transform: rotate(0deg) translateY(0); }
      25% { transform: rotate(-3deg) translateY(-1px); }
      75% { transform: rotate(3deg) translateY(1px); }
    }

    @keyframes armTalkL {
      0%, 100% { transform: rotate(16deg); }
      50% { transform: rotate(32deg); }
    }

    @keyframes armTalkR {
      0%, 100% { transform: rotate(-16deg); }
      50% { transform: rotate(-32deg); }
    }

    @keyframes bubbleTalk {
      0%, 100% { transform: translateY(0) scale(1); }
      50% { transform: translateY(-6px) scale(1.04); }
    }

    @keyframes talkEye {
      0%, 100% { box-shadow: 0 0 18px rgba(95,230,255,.95); }
      50% { box-shadow: 0 0 28px rgba(95,230,255,1); }
    }

    @keyframes wave {
      0%, 100% { transform: scaleY(.55); }
      50% { transform: scaleY(1.2); }
    }

    @media (max-width: 900px) {
      .app {
        grid-template-columns: 1fr;
      }

      .stage {
        min-height: 440px;
      }
    }
  </style>
</head>
<body>
  <div class="app">
    <div class="stage">
      <div class="scene">
        <div class="robot-scene talking" id="robotScene">
          <div class="speech-bubble">
            <div class="bubble-line"></div>
            <div class="bubble-line short"></div>
            <div class="bubble-line blue"></div>
          </div>

          <div class="shadow"></div>

          <div class="robot">
            <div class="head">
              <div class="ear left"></div>
              <div class="ear right"></div>
              <div class="visor">
                <div class="eye left"></div>
                <div class="eye right"></div>
              </div>
            </div>

            <div class="neck"></div>
            <div class="torso"></div>
            <div class="arm left"></div>
            <div class="arm right"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel">
      <div class="eyebrow">AI Investigator</div>
      <h1>AI Investigator Assistant</h1>
      <p class="sub">
        Ask about evidence, speak your question, and get a spoken AI response back from your backend.
      </p>

      <div class="wave">
        <span></span><span></span><span></span><span></span>
      </div>

      <textarea
        id="question"
        rows="5"
        placeholder="Ask about evidence..."
      ></textarea>

      <div class="controls">
        <button class="primary" onclick="askAI()">Ask</button>
        <button class="secondary" onclick="startVoice()">🎤 Speak</button>
        <button class="secondary" onclick="setTalking(true)">Talking mode</button>
        <button class="secondary" onclick="setTalking(false)">Idle mode</button>
      </div>

      <div id="result">AI response appears here.</div>
    </div>
  </div>

 ```javascript
<script>

const robotScene =
document.getElementById(
'robotScene'
);

let recognition;
let waitingForQuestion = false;

function setTalking(state){
    if(state){
        robotScene.classList.add(
            'talking'
        );
    }
    else{
        robotScene.classList.remove(
            'talking'
        );
    }
}

async function askAI(){
    const question =
    document.getElementById(
        'question'
    ).value;

    if(question.trim()===""){
        return;
    }

    document.getElementById(
        'result'
    ).innerHTML =

    "🔍 Analyzing evidence...";
    setTalking(true);

    try{
        const response =
        await fetch(
        '/ask-evidence',
        {
        method:'POST',
        headers:{
        'Content-Type':
        'application/json',
        'X-CSRF-TOKEN':
        document.querySelector(

        'meta[name="csrf-token"]'
        ).content
        },
        body:JSON.stringify({
        question:question
        })
        }
        );

        const data =
        await response.json();
        document.getElementById(
            'result'
        ).innerHTML =
        "<h3>AI Investigator</h3>"
        +
        "<p>"
        +
        data.answer
        +
        "</p>";
        speakResponse(
            data.answer
        );

        document.getElementById(
            'question'
        ).value = "";
    }
    catch(error){
        document.getElementById(
            'result'
        ).innerHTML =
        "Error communicating with AI.";
        console.log(
            error
       );
        setTalking(false);
    }
}

function speakResponse(text){
   window.speechSynthesis.cancel();
    const utterance =
    new SpeechSynthesisUtterance(
        text
    );

    const voices =
    speechSynthesis.getVoices();
    utterance.voice =
        voices.find(
            v=>v.name==="Karen"
        )
        ||
        voices.find(
            v=>v.name==="Tessa"
        )
        ||
        voices.find(
            v=>v.name==="Samantha"
        )
        ||
        voices[0];
    utterance.lang =
    'en-US';
    utterance.rate =
    0.92;
  utterance.pitch =
    1.10;
    utterance.volume =
    1;
    utterance.onstart =

    function(){

        setTalking(true);
    };
    utterance.onend =
    function(){
        setTalking(false);
    };
    speechSynthesis.speak(
        utterance
    );
}

function startBuddy(){
    if(
    !('webkitSpeechRecognition'
    in window)
    ){
        alert(
        "Speech Recognition unsupported"
        );
        return;
    }
    recognition =

    new webkitSpeechRecognition();
    recognition.continuous =
    true;
    recognition.interimResults =
    false;
    recognition.lang =
    'en-US';
    recognition.start();
    recognition.onresult =

    async function(event){
        const transcript =

        event.results[

        event.results.length-1
        ][0]

        .transcript
        .toLowerCase()

        .trim();
        console.log(

            transcript
        );

        if(

        transcript.includes(

        "hey buddy"

        )

        ||

        transcript.includes(

        "buddy"

        )

        ){

            if(

            waitingForQuestion

            ){

                return;

            }
            waitingForQuestion =

            true;

            document.getElementById(

            'result'

            ).innerHTML =

            "🎤 Listening...";
            speakResponse(

            "Yes investigator"

            );
         return;
        }

        if(
        waitingForQuestion

        ){
            waitingForQuestion =

            false;

            document.getElementById(

                'question'

            ).value =
            transcript;
            document.getElementById(

            'result'
            ).innerHTML =
            "🧠 Thinking...";
            await askAI();

        }
    };

    recognition.onend =
    function(){
        recognition.start();
    };

    recognition.onerror =
    function(error){
        console.log(
        error

        );

        recognition.start();
    };
}
window.onload =

function(){

    startBuddy();

};

</script>

</body>
</html>
