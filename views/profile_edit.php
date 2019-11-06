<section class="proEditBox">
    <div class="ui medium center aligned header" id="headerColor">
        Edit Profile
    </div>

    <div class="proImageBox">
        <img src="images/js.jpg"  />
    </div>

    <div class="ui small center aligned header" id="uploaderColor">
        Upload a new photo
    </div>

    <form class="ui form">
        <div class="field">
             <label for="fname">Firstname</label>
            <div class="ui small icon input">
                <i class="ui right floated pencil icon"></i>
                <input type="text" placeholder="enter your first name" id="fname" />
            </div>
        </div>

        <div class="field">
             <label for="lname">Lastname</label>
            <div class="ui small icon input">
                <i class="ui right floated pencil icon"></i>
                <input type="text" placeholder="enter your last name" id="lname" />
            </div>
        </div>

        <div class="field">
             <label for="email">Email</label>
            <div class="ui small icon input">
                <i class="ui right floated mail icon"></i>
                <input type="email" placeholder="enter your email" id="email" />
            </div>
        </div>

        <div class="field">
             <label for="bio">Short Bio (max 300 characters)</label>
            <div class="ui small icon ">
                <textarea id="bio"></textarea>
            </div>
        </div>
    </form>
</section>