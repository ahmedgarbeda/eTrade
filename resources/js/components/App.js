import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import APHeader from './APHeader';
import Sidebar from './Sidebar';
import APFooter from './APFooter';

class App extends Component {
    render() {
        return (
            <div>
                <APHeader />
                <Sidebar />
                <APFooter />
            </div>
        );
    }
}

export default App;

