<!DOCTYPE html>
<html>
<head>
  <title>Video Consultation</title>
  <script src="https://media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
</head>
<body>
  <div id="room-controls">
    <label for="room-name-input">Room name:</label>
    <input type="text" id="room-name-input">
    <button id="join-room-button">Join Room</button>
    <button id="leave-room-button" disabled>Leave Room</button>
  </div>
  <div id="remote-participant"></div>
  <script>
    var accessToken = "your_twilio_access_token_here";
    var remoteParticipantDiv = document.getElementById("remote-participant");
    var room;
    var connectButton = document.getElementById("join-room-button");
    var disconnectButton = document.getElementById("leave-room-button");

    Twilio.Video.connect(accessToken, {audio: true, video: true, name: "video-consultation"})
      .then(room => {
        console.log(`Connected to Room ${room.name}`);
        connectButton.disabled = true;
        disconnectButton.disabled = false;

        room.on("participantConnected", participant => {
          console.log(`Participant "${participant.identity}" has joined the room`);
          participant.tracks.forEach(track => {
            console.log(`Track ${track} is ${track.isEnabled ? "enabled" : "disabled"}`);
            if (track.kind == "video") {
              remoteParticipantDiv.appendChild(track.attach());
            }
          });
        });

        room.on("participantDisconnected", participant => {
          console.log(`Participant "${participant.identity}" has left the room`);
          remoteParticipantDiv.innerHTML = "";
        });

        room.participants.forEach(participant => {
          console.log(`Participant "${participant.identity}" is already in the room`);
          participant.tracks.forEach(track => {
            console.log(`Track ${track} is ${track.isEnabled ? "enabled" : "disabled"}`);
            if (track.kind == "video") {
              remoteParticipantDiv.appendChild(track.attach());
            }
          });
        });

      })
      .catch(error => {
        console.log(`Error connecting to Twilio: ${error.message}`);
      });

    disconnectButton.addEventListener("click", function() {
      room.disconnect();
      console.log(`Disconnected from Room ${room.name}`);
      connectButton.disabled = false;
      disconnectButton.disabled = true;
    });

    connectButton.addEventListener("click", function() {
      var roomName = document.getElementById("room-name-input").value;
      Twilio.Video.connect(accessToken, {audio: true, video: true, name: roomName})
        .then(newRoom => {
          console.log(`Connected to Room ${newRoom.name}`);
          connectButton.disabled = true;
          disconnectButton.disabled = false;

          room = newRoom;
        })
        .catch(error => {
          console.log(`Error connecting to Twilio: ${error.message}`);
        });
    });
  </script>
</body>
</html>
