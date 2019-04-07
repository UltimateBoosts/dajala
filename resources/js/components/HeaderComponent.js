import React from 'react'
import { Link } from 'react-router-dom'

const Header = () => (
  <nav className='navbar navbar-expand-md navbar-light navbar-laravel'>
    <div className='container'>
      <ul className="nav nav-pills nav-fill">
        <li className="nav-item">
          <Link className='nav-link active' to='/'>Inventory</Link>
        </li>
        <li className="nav-item">
          <Link className='nav-link' to='/buy'>Buy</Link>
        </li>
        <li className="nav-item">
          <Link className='nav-link' to='/reports'>Reports</Link>
        </li>
      </ul>
    </div>
  </nav>
)

export default Header