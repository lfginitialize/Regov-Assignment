import React, { useState } from 'react';

const AboutMeEditor = () => {
  const [aboutMe, setAboutMe] = useState('');

  const handleSave = () => {
    // Make API call to save About me section
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    handleSave();
  };

  return (
    <div>
      <h2>About Me Editor</h2>
      <form onSubmit={handleSubmit}>
        <textarea
          placeholder="Write about yourself..."
          value={aboutMe}
          onChange={(e) => setAboutMe(e.target.value)}
          className="about-me-textarea"
        />
        <button type="submit">Save</button>
        <button type="submit">Apply</button>
      </form>
      <h2>Drafts</h2>
    </div>
  );
};

export default AboutMeEditor;
